<?php
/**
 * @name UsersController 
 * @author YONY ACEVEDO
 * @description Controlador que se encarga de procesar las solicitudes relacionadas 
 * a los Usuarios
 */
class UsersController extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
   
    }
        
    public function index() 
    {    
        $this->view->app->js = array(
            'js/Users/Users.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Users/Users.css',
            'css/default.css' 
        );        
        
        $this->view->title = 'Listado de Usuarios';
        $this->view->render('header');
        $this->view->render('Users/index');
        $this->view->render('footer');
    }
    
    public function usersjson() 
    {   
        $list=$this->model->findByParams($this->view->request->data);
        
        foreach ($list['data'] as $key => $value) {
            
            $list['data'][$key]=array(
                'id'=> $value->users_id,
                'username'=> "<small>".$value->users_username."</small>",
                'identity_card'=> $value->sellers_identity_card,
                "role" => "<span class=\"label label-info\">".$this->view->role['type'][$value->users_role]."</span>",
                'is_active'=> $value->users_is_active,
                'estatus'=> "<span class=\"".$this->view->statusClass[$value->users_is_active]."\"><small>".$this->view->status[$value->users_is_active]."</small></span>",
                'created'=> "<small>".date('d/m/Y', strtotime($value->users_created))."</small>",
                'hour'=> "<small>".date('g:i:s A', strtotime($value->users_created))."</small>",
                'opciones'=> '
                <div class="btn-group">
                    <button type="button" class="btn btn-default text-danger-lighter light" onclick="location.href=\'Users/edit/'.$value->users_id.'\'">
                      <i class="fa fa-edit"></i>
                    </button>
                </div>'
            );
        }
        
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($list,JSON_PRETTY_PRINT);
        exit();

    }

    public function add() 
    {   
        $this->view->debug=$this->view->request;
        $variables=array("variables"=>$this->view->debug);
        
        $this->view->app->js = array(
        'js/Users/Users.js',
        'js/Users/Add.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Users/Users.css',
        'css/default.css' 
        );

        $this->view->title = 'Agregar Usuario';
        $this->view->sellersList = $this->model->selector(array("table"=>'sellers LEFT JOIN users ON sellers.id = users.sellers_id',
                                                            "fields"=>array(
                                                                    "id"=>'sellers.id as id',
                                                                    "description"=>'sellers.description as description'
                                                            ),
                                                            "condition"=>' WHERE users.sellers_id IS Null '
                                                        )
                                   );
        
        $this->view->AccesList = $this->model->selector(array("table"=>'bookshop',
                                                            "fields"=>array(
                                                                    "id"=>'id',
                                                                    "description"=>'description',
                                                                    "is_active"=>'is_active'
                                                            )
                                                        )
                                 );
        
        
        foreach ($this->view->AccesList as $key => $value) {
            
            $this->view->bookshopAccesList[$value['id']]=$value;
                    
        }
        

        if($this->view->request->method==='POST' && !empty($this->view->request->data)){
            $this->view->request->data['operation']='CREATE';
            $this->view->request->data['sellers_business_id']= Session::get('business_id');
            $this->view->request->data['sellers_users_id']= Session::get('userid');
            $this->view->request->data['users_password']=Hash::create('sha256', $this->view->request->data['users_password'], HASH_PASSWORD_KEY);
            $this->view->request->data['unique']= array('username');
            
            $this->view->message = $this->model->save($this->view->request->data);
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($this->view->message);
            
        }elseif($this->view->request->method==='GET'){
            $this->view->render('header');
            $this->view->render('Users/add');
            $this->view->render('footer');
        }
    }
    
    public function edit($id) 
    {   
        $this->view->debug=$this->view->request;

        $this->view->app->js = array(
        'js/Users/Users.js',
        'js/Users/Edit.js',
        'js/custom.js'
        );
        
        $this->view->app->css = array(
        'css/Users/Users.css',
        'css/default.css' 
        );

        $this->view->title = 'Editar Usuario';
        $this->view->List = $this->model->find($id);
        
        $this->view->bookshopList = $this->model->selector(array("table"=>'bookshop',"fields"=>array("id"=>'id',"description"=>'description')));        
        
        $this->view->AccesList = $this->model->selector(array(
                                                               "table"=>'users_hash_bookshop INNER JOIN bookshop ON users_hash_bookshop.bookshop_id = bookshop.id',
                                                               "fields"=>array(  
                                                                        'bookshop.id as id',
                                                                        'bookshop.description as description',
                                                                        'users_hash_bookshop.is_active as assigned',
                                                                        'users_hash_bookshop.users_id as users_id',
                                                                        'bookshop.is_active as is_active'
                                                                ),
                                                                "condition" =>' WHERE users_hash_bookshop.users_id='.$id.'',
                                                                "orderby" => NULL
                                                                )
                                         );
        
        foreach ($this->view->AccesList as $key => $value) {
            
           $this->view->bookshopAccesList[$value['id']]=$value;

        }

        foreach ($this->view->bookshopList as $key => $value) {
            
           if($value['id'] != $this->view->List[0]['users_bookshop_id']){
                $this->view->bookshopsList[$value['id']]=$value;
                $this->view->bookshopsList[$value['id']]['assigned']=$this->view->bookshopAccesList[$value['id']]['assigned'];
           } 
           $this->view->bookshopselectList[$value['id']]=$value;
           
        }
        
        
        
        if(isset($id) && !empty($id) && is_numeric($id)){
            
            
            if($this->view->request->method==='POST' && !empty($this->view->request->data) && empty($this->view->request->data['operation'])){
                
                $this->view->request->data['operation']='UPDATE';
                $this->view->request->data['where']=array("id"=>$id);
                $this->view->request->data['users_password']=Hash::create('sha256', $this->view->request->data['users_password'], HASH_PASSWORD_KEY);
                $this->view->message = $this->model->save($this->view->request->data);
               
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($this->view->message);
                
                
            }elseif($this->view->request->method==='POST' && !empty($this->view->request->data) && !empty($this->view->request->data['operation'])=='ASSIGN'){
                unset($this->view->request->data['id']);
                $this->view->request->data['where']=array("users_id"=>$this->view->request->data['users_id'],"bookshop_id"=>$this->view->request->data['bookshop_id']);
                //$this->view->request->data['unique']= array('bookshop_id','users_id');
                
                $this->view->message = $this->model->assign($this->view->request->data);
                
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($this->view->message);
                
            }
                
            if($this->view->request->method==='GET'){
                $this->view->render('header');
                $this->view->render('Users/edit',array("variables"=>$this->view->debug));
                $this->view->render('footer');
            }
            
            
        }else{
            $this->view->redirect('Error/index/500');
        }
    }
}