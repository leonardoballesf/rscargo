<?php
/**
 * @name CategoriesController 
 * @author YONY ACEVEDO
 * @description Controlador que se encarga de procesar las solicitudes relacionadas 
 * a las categorias
 */
    
class CategoriesController extends Controller {
    
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }
        
    public function index() 
    {    
        $this->view->app->js = array(
            'js/Categories/Categories.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Categories/Categories.css',
            'css/default.css' 
        );
       
        $this->view->List = $this->model->findAll();
        $this->view->title = 'Listado de Categorías';
        $this->view->render('header');
        $this->view->render('Categories/index');
        $this->view->render('footer');
    }
    
    public function categoriesJson() 
    {   
        $list=$this->model->findByParams($this->view->request->data);
        
        foreach ($list['data'] as $key => $value) {
            
            $list['data'][$key]=array(
                'id'=> $value->categories_id,
                'name'=> "<small>".$value->categories_name."</small>",
                'description'=> "<small>".$value->categories_description."</small>",
                'users_id'=> $value->sellers_users_id,
                'is_active'=> $value->categories_is_active,
                'estatus'=> "<span class=\"".$this->view->statusClass[$value->categories_is_active]."\"><small>".$this->view->status[$value->categories_is_active]."</small></span>",
                'created'=> "<small>".date('d/m/Y', strtotime($value->categories_created))."</small>",
                'hour'=> "<small>".date('g:i:s A', strtotime($value->categories_created))."</small>",
                'opciones'=> '
                <div class="btn-group">
                    <button type="button" class="btn btn-default text-danger-lighter light" onclick="location.href=\'Categories/edit/'.$value->categories_id.'\'">
                      <i class="fa fa-edit"></i>
                    </button>
                </div>'
            );
        }
        
        $this->response->responseType(array(
                                   'Content-Type' => 'application/json;charset=utf-8'
                              ),
                              json_encode($list,JSON_PRETTY_PRINT)
        );

    }

    public function add() 
    {   
        $this->view->debug=$this->view->request;
        $variables=array("variables"=>$this->view->debug);
        
        $this->view->app->js = array(
        'js/Categories/Categories.js',
        'js/Categories/Add.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Categories/Categories.css',
        'css/default.css' 
        );

        $this->view->title = 'Agregar Categoría';
            
        if($this->view->request->method==='POST' && !empty($this->view->request->data)){
            $this->view->request->data['operation']='CREATE';
            $this->view->request->data['categories_business_id']= Session::get('business_id');
            $this->view->request->data['categories_users_id']= Session::get('userid');
            //$this->view->request->data['unique']= array('categories_name');
            
            $this->view->message = $this->model->save($this->view->request->data);
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($this->view->message);
            
        }elseif($this->view->request->method==='GET'){
            $this->view->render('header');
            $this->view->render('Categories/add');
            $this->view->render('footer');
        }
    }
    
    public function edit($id) 
    {   
        $this->view->debug=$this->view->request;

        $this->view->app->js = array(
        'js/Categories/Categories.js',
        'js/Categories/Edit.js',
        'js/custom.js'
        );
        
        $this->view->app->css = array(
        'css/Categories/Categories.css',
        'css/default.css' 
        );

        $this->view->title = 'Editar Categoría';
        $this->view->List = $this->model->find($id);
        
        if(isset($id) && !empty($id) && is_numeric($id)){
            
            if($this->view->request->method==='POST' && !empty($this->view->request->data)){
                $this->view->request->data['operation']='UPDATE';
                $this->view->request->data['where']=array("id"=>$id);
                $this->view->message = $this->model->save($this->view->request->data);

                header('Content-type: application/json; charset=utf-8');
                echo json_encode($this->view->message);

            }else{
                $this->view->render('header');
                $this->view->render('Categories/edit',array("variables"=>$this->view->debug));
                $this->view->render('footer');
            }
            
        }else{
            $this->view->redirect('Error/index/500');
        }
    }    
    
    
    
}
