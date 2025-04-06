<?php
/**
 * @name TariffsController 
 * @author YONY ACEVEDO
 * @description Controlador que se encarga de procesar las solicitudes 
 * relacionadas a las tarifas
 */

class TariffsController extends Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }
    
    public function index() 
    {    
        $this->view->app->js = array(
            'js/Tariffs/Tariffs.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Tariffs/Tariffs.css',
            'css/default.css' 
        );
        
        $this->view->title = 'Listado de Tarifas';
        $this->view->render('header');
        $this->view->render('Tariffs/index');
        $this->view->render('footer');
    }

    public function tariffsJson()
    {   
        $list=$this->model->findByParams($this->view->request->data);

        foreach ($list['data'] as $key => $value) {
            
            $list['data'][$key]=array(
                'id'=> $value->tariffs_id,
                'name'=> "<small>".$value->tariffs_name."</small>",
                'description'=> "<small>".$value->tariffs_description."</small>",
                'value'=> "<small>".$value->tariffs_value."</small>",
                'users_id'=> $value->tariffs_users_id,
                'estatus'=> "<span class=\"".$this->view->statusClass[$value->tariffs_is_active]."\"><small>".$value->status_type_description."</small></span>",
                'created'=> "<small>".date('d/m/Y', strtotime($value->tariffs_created))."</small>",
                'hour'=> "<small>".date('g:i:s A', strtotime($value->tariffs_created))."</small>",
                'opciones'=> '
                <div class="btn-group">
                    <button type="button" class="btn btn-default text-danger-lighter light" onclick="location.href=\'Tariffs/edit/'.$value->tariffs_id.'\'">
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
        'js/Tariffs/Tariffs.js',
        'js/Tariffs/Add.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Tariffs/Tariffs.css',
        'css/default.css' 
        );

        $this->view->title = 'Agregar Tarifa';
            
        if($this->view->request->method==='POST' && !empty($this->view->request->data)){
            $this->view->request->data['operation']='CREATE';
            $this->view->request->data['tariffs_business_id']= Session::get('business_id');
            $this->view->request->data['tariffs_users_id']= Session::get('userid');
            $this->view->request->data['unique']= array('description');
            
            $this->view->message = $this->model->save($this->view->request->data);
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($this->view->message);
            
        }elseif($this->view->request->method==='GET'){
            $this->view->render('header');
            $this->view->render('Tariffs/add');
            $this->view->render('footer');
       }
    }

    public function edit($id) 
    {   
        $this->view->debug=$this->view->request;

        $this->view->app->js = array(
        'js/Tariffs/Tariffs.js',
        'js/Tariffs/Edit.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Tariffs/Tariffs.css',
        'css/default.css' 
        );

        $this->view->title = 'Editar Tarifa';
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
                $this->view->render('Tariffs/edit',array("variables"=>$this->view->debug));
                $this->view->render('footer');
            }
            
        }else{
            $this->view->redirect('Error/index/500');
        }
    }    
    
}
