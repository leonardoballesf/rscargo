<?php
/**
 * @name AttributesController 
 * @author YONY ACEVEDO
 * @description Controlador que se encarga de procesar las solicitudes 
 * relacionadas a los atributos de los árticulos registrados en el sistema
 */

class AttributesController extends Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }
    
    public function index() 
    {    
        $this->view->app->js = array(
            'js/Attributes/Attributes.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Attributes/Attributes.css',
            'css/default.css' 
        );
        
        $this->view->title = 'Listado de Atributos';
        $this->view->render('header');
        $this->view->render('Attributes/index');
        $this->view->render('footer');
    }

    public function attributesJson()
    {   
        $list=$this->model->findByParams($this->view->request->data);

        foreach ($list['data'] as $key => $value) {
            
            $list['data'][$key]=array(
                'id'=> $value->attributes_id,
                'name'=> "<small>".$value->attributes_name."</small>",
                'description'=> "<small>".$value->attributes_description."</small>",
                'users_id'=> $value->attributes_users_id,
                'estatus'=> "<span class=\"".$this->view->statusClass[$value->attributes_is_active]."\"><small>".$value->status_type_description."</small></span>",
                'created'=> "<small>".date('d/m/Y', strtotime($value->attributes_created))."</small>",
                'hour'=> "<small>".date('g:i:s A', strtotime($value->attributes_created))."</small>",
                'opciones'=> '
                <div class="btn-group">
                    <button type="button" class="btn btn-default text-danger-lighter light" onclick="location.href=\'Attributes/edit/'.$value->attributes_id.'\'">
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
        'js/Attributes/Attributes.js',
        'js/Attributes/Add.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Attributes/Attributes.css',
        'css/default.css' 
        );

        $this->view->title = 'Agregar Atributo';
            
        if($this->view->request->method==='POST' && !empty($this->view->request->data)){
            $this->view->request->data['operation']='CREATE';
            $this->view->request->data['attributes_business_id']= Session::get('business_id');
            $this->view->request->data['attributes_users_id']= Session::get('userid');
            $this->view->request->data['unique']= array('description');
            
            $this->view->message = $this->model->save($this->view->request->data);
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($this->view->message);
            
        }elseif($this->view->request->method==='GET'){
            $this->view->render('header');
            $this->view->render('Attributes/add');
            $this->view->render('footer');
        }
    }

    public function edit($id) 
    {   
        $this->view->debug=$this->view->request;

        $this->view->app->js = array(
        'js/Attributes/Attributes.js',
        'js/Attributes/Edit.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Attributes/Attributes.css',
        'css/default.css' 
        );

        $this->view->title = 'Editar Atributo';
        $this->view->settings = $this->model->find($id);
        
        if(isset($id) && !empty($id) && is_numeric($id)){
            
            if($this->view->request->method==='POST' && !empty($this->view->request->data)){
                $this->view->request->data['operation']='UPDATE';
                $this->view->request->data['where']=array("id"=>$id);
                $this->view->message = $this->model->save($this->view->request->data);

                header('Content-type: application/json; charset=utf-8');
                echo json_encode($this->view->message);

            }else{
                $this->view->render('header');
                $this->view->render('Attributes/edit',array("variables"=>$this->view->debug));
                $this->view->render('footer');
            }
            
        }else{
            $this->view->redirect('Error/index/500');
        }
    }    
    
}
