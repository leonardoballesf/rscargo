<?php
/**
 * @name AttributesController 
 * @author YONY ACEVEDO
 * @description Controlador que se encarga de procesar las solicitudes 
 * relacionadas a los atributos de los árticulos registrados en el sistema
 */

class PresentationController extends Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }
    
    public function index() 
    {    
        $this->view->app->js = array(
            'js/Presentation/Presentation.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Presentation/Presentation.css',
            'css/default.css' 
        );
        
        $this->view->List = $this->model->findAll();
        $this->view->title = 'Tipos de Presentaciones';
        $this->view->render('header');
        $this->view->render('Presentation/index');
        $this->view->render('footer');
    }

    public function presentationJson()
    {   
        $list=$this->model->findByParams($this->view->request->data);

        foreach ($list['data'] as $key => $value) {
            
            $list['data'][$key]=array(
                'id'=> $value->presentation_id,
                'description'=> "<small>".$value->presentation_description."</small>",
                'abbreviation'=> "<small>".$value->presentation_abbreviation."</small>",
                'quantity'=> "<small>".$value->presentation_quantity."</small>",
                'users_id'=> $value->presentation_users_id,
                'estatus'=> "<span class=\"".$this->view->statusClass[$value->presentation_is_active]."\"><small>".$this->view->status[$value->presentation_is_active]."</small></span>",
                'created'=> "<small>".date('d/m/Y', strtotime($value->presentation_created))."</small>",
                'hour'=> "<small>".date('g:i:s A', strtotime($value->presentation_created))."</small>",
                'opciones'=> '
                <div class="btn-group">
                    <button type="button" class="btn btn-default text-danger-lighter light" onclick="location.href=\'Presentation/edit/'.$value->presentation_id.'\'">
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
        'js/Presentation/Presentation.js',
        'js/Presentation/Add.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Presentation/Presentation.css',
        'css/default.css' 
        );

        $this->view->title = 'Agregar Presentación';
            
        if($this->view->request->method==='POST' && !empty($this->view->request->data)){
            $this->view->request->data['operation']='CREATE';
            $this->view->request->data['presentation_business_id']= Session::get('business_id');
            $this->view->request->data['presentation_users_id']= Session::get('userid');
            
            $this->view->message = $this->model->save($this->view->request->data);
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($this->view->message);
            
        }elseif($this->view->request->method==='GET'){
            $this->view->render('header');
            $this->view->render('Presentation/add');
            $this->view->render('footer');
        }
    }

    public function edit($id) 
    {   
        $this->view->debug=$this->view->request;

        $this->view->app->js = array(
        'js/Presentation/Presentation.js',
        'js/Presentation/Edit.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Presentation/Presentation.css',
        'css/default.css' 
        );

        $this->view->title = 'Editar Presentación';
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
                $this->view->render('Presentation/edit',array("variables"=>$this->view->debug));
                $this->view->render('footer');
            }
            
        }else{
            $this->view->redirect('Error/index/500');
        }
    }    
    
}
