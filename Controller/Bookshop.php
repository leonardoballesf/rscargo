<?php
/**
 * @name BookshopController 
 * @author YONY ACEVEDO
 * @description Controlador que se encarga de procesar las solicitudes relacionadas 
 * a las Sucursales o Librerías 
 */

class BookshopController extends Controller{
    
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    public function index() 
    {    
        $this->view->app->js = array(
            'js/Bookshop/Bookshop.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Bookshop/Bookshop.css',
            'css/default.css' 
        );
        
        $this->view->title = 'Listado de Sucursales';
        $this->view->render('header');
        $this->view->render('Bookshop/index');
        $this->view->render('footer');
    }
    
    public function bookshopJson()
    {   
        $list=$this->model->findByParams($this->view->request->data);

        foreach ($list['data'] as $key => $value) {
            
            $list['data'][$key]=array(
                'id'=> $value->bookshop_id,
                'description'=> "<small>".$value->bookshop_description."</small>",
                'regions_id'=> $value->bookshop_regions_id,
                'region_description'=> "<small>".$value->region_description."</small>",
                'location_id'=> $value->bookshop_location_id,
                'location'=> "<small>".$value->bookshop_location."</small>",
                'location_address'=> "<small>".$value->bookshop_location_address."</small>",
                'address'=> "<small>".$value->bookshop_address."</small>",
                'phone'=> "<small>".$value->bookshop_phone."</small>",
                'email'=> "<small>".$value->bookshop_email."</small>",
                'sellers'=> "<small>".$value->sellers_description."</small>",
                'users_id'=> $value->bookshop_users_id,
                'is_current'=> $value->bookshop_is_current,
                'estatus'=> "<span class=\"".$this->view->statusClass[$value->bookshop_is_active]."\"><small>".$value->status_description."</small></span>",
                'created'=> "<small>".date('d/m/Y', strtotime($value->bookshop_created))."</small>",
                'hour'=> "<small>".date('g:i:s A', strtotime($value->bookshop_created))."</small>",
                'opciones'=> '
                <div class="btn-group">
                    <button type="button" class="btn btn-default text-danger-lighter light" onclick="location.href=\'Bookshop/edit/'.$value->bookshop_id.'\'">
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
        'js/Bookshop/Bookshop.js',
        'js/Bookshop/Add.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Bookshop/Bookshop.css',
        'css/default.css' 
        );

        $this->view->title = 'Agregar Sucursal';
        $this->view->bookshopList= $this->model->selector(array("table"=>'bookshop',"fields"=>array("id"=>'id',"description"=>'description')));
        $this->view->bookshopRegionsList= $this->model->selector(array("table"=>'regions',"fields"=>array("id"=>'id',"description"=>'description')));
        $this->view->bookshopLocationList= $this->model->selector(array("table"=>'location',"fields"=>array("id"=>'id',"description"=>'location as description')));
            
        if($this->view->request->method==='POST' && !empty($this->view->request->data)){
            $this->view->request->data['operation']='CREATE';
            $this->view->request->data['bookshop_business_id']= Session::get('business_id');
            $this->view->request->data['bookshop_users_id']= Session::get('userid');
            $this->view->request->data['unique']= array('description');
            
            $this->view->message = $this->model->save($this->view->request->data);
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($this->view->message);
            
        }elseif($this->view->request->method==='GET'){
            $this->view->render('header');
            $this->view->render('Bookshop/add');
            $this->view->render('footer');
        }
    }
    
    public function edit($id) 
    {   
        $this->view->debug=$this->view->request;

        $this->view->app->js = array(
        'js/Bookshop/Bookshop.js',
        'js/Bookshop/Edit.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Bookshop/Bookshop.css',
        'css/default.css' 
        );

        $this->view->title = 'Editar Sucursal';
        $this->view->settings = $this->model->find($id);
        $this->view->bookshopList= $this->model->selector(array("table"=>'bookshop',"fields"=>array("id"=>'id',"description"=>'description')));
        $this->view->bookshopRegionsList= $this->model->selector(array("table"=>'regions',"fields"=>array("id"=>'id',"description"=>'description')));
        $this->view->bookshopLocationList= $this->model->selector(array("table"=>'location',"fields"=>array("id"=>'id',"description"=>'location as description')));
        
        if(isset($id) && !empty($id) && is_numeric($id)){
            
            if($this->view->request->method==='POST' && !empty($this->view->request->data)){
                $this->view->request->data['operation']='UPDATE';
                $this->view->request->data['where']=array("id"=>$id);
                $this->view->message = $this->model->save($this->view->request->data);

                header('Content-type: application/json; charset=utf-8');
                echo json_encode($this->view->message);

            }else{
                $this->view->render('header');
                $this->view->render('Bookshop/edit',array("variables"=>$this->view->debug));
                $this->view->render('footer');
            }
            
        }else{
            $this->view->redirect('Error/index/500');
        }
    }

    public function backup() 
    {
        $this->view->title = 'Crear Respaldos';
        $this->view->user = $this->model->userSingleList($id);
        
        $this->view->render('header');
        $this->view->render('user/edit');
        $this->view->render('footer');
    }
    
    
}
