<?php
/**
 * Description of SettingsController
 *
 * @author YONY ACEVEDO
 */

class SettingsController extends Controller {
    
//put your code here
   
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->role=array(1=>'Usuario',2=>'Administrador',3=>'Super Administrador');
        $this->view->status=array(1=>'Activo',2=>'Inactivo');
        $this->view->statusClass=array(1=>'label label-success',2=>'label label-danger');
        
    }
        
    public function index() 
    {    
        $this->view->app->js = array(
            'js/Settings/Settings.js'
        );
        $this->view->app->css = array(
            'css/Settings/Settings.css',
            'css/default.css' 
        );
        
        $this->view->title = 'Opciones de Configuración';
        $this->view->List = $this->model->findAll();
        $this->view->bookshopList= $this->model->selector(array("table"=>'bookshop',"fields"=>array("id"=>'id',"description"=>'description')));
        $this->view->bookshopRegionsList= $this->model->selector(array("table"=>'regions',"fields"=>array("id"=>'id',"description"=>'description')));
        $this->view->bookshopLocationList= $this->model->selector(array("table"=>'location',"fields"=>array("id"=>'id',"description"=>'location as description')));
        $this->view->render('header');
        $this->view->render('Settings/index');
        $this->view->render('footer');
    }
    
    public function settingsJson() 
    {   
        if(!empty($_GET['data'])){
            $param= json_decode($_GET['data']);
            foreach ($param as $key => $value) {
                $params=array($value);
            }
            $list=$this->model->findByParams($param);
        }else{
            $list=$this->model->findAll();
        }
            $list=$this->model->findAll();
        
        foreach ($list as $sellers) {
            $row = array(
            "VENDEDOR" => $sellers['description'],
            "IDENTIFICACION" => $sellers['identity_card'],
            "TELEFONO" => $sellers['phone'],
            "INGRESO" => "<span class=\"label label-info\">".date('d/m/Y',  strtotime($sellers['created']))."</span>",
            "ESTATUS" => "<span class=\"".$this->view->statusClass[$sellers['is_active']]."\">".$this->view->status[$sellers['is_active']]."</span>",
            "OPCIONES" => '
            <div class="btn-group text-right">
                <button type="button" class="btn btn-danger br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> OPCIONES
                  <span class="caret ml5"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="javascript:void(0)" onclick="console.log(\''.$sellers['description'].'\')">Modificar</a>
                  </li>
                  <li>
                    <a href="javascript:void(0)" onclick="alert(\''.$sellers['description'].'\')">Borrar</a>
                  </li>
                </ul>
            </div>'
            );
            $data[] = $row;
        }
        $output = array("data" => $data);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($output,JSON_OBJECT_AS_ARRAY);
    }

    public function add() 
    {   
        $this->view->debug=$this->view->request;

        $this->view->app->js = array(
        'js/Settings/Settings.js',
        'js/Settings/Add.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Settings/Settings.css',
        'css/default.css' 
        );

        $this->view->title = 'Agregar Configuración';
        $this->view->bookshopList= $this->model->selector(array("table"=>'bookshop',"fields"=>array("id"=>'id',"description"=>'description')));
        $this->view->bookshopRegionsList= $this->model->selector(array("table"=>'regions',"fields"=>array("id"=>'id',"description"=>'description')));
        $this->view->bookshopLocationList= $this->model->selector(array("table"=>'location',"fields"=>array("id"=>'id',"description"=>'location as description')));
            
        if($this->view->request->method==='POST' && !empty($this->view->request->data)){
            $this->view->request->data['operation']='CREATE';
            $this->view->message = $this->model->save($this->view->request->data);
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($this->view->message);

        }else{

            $this->view->render('header');
            $this->view->render('Settings/add',array("variables"=>$this->view->debug));
            $this->view->render('footer');
        }
    }
    
    public function edit($id) 
    {   
        $this->view->debug=$this->view->request;

        $this->view->app->js = array(
        'js/Settings/Settings.js',
        'js/Settings/Edit.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Settings/Settings.css',
        'css/default.css' 
        );

        $this->view->title = 'Editar Configuración';
        $this->view->settings = $this->model->find($id);
        $this->view->bookshopList= $this->model->selector(array("table"=>'bookshop',"fields"=>array("id"=>'id',"description"=>'description')));
        $this->view->bookshopRegionsList= $this->model->selector(array("table"=>'regions',"fields"=>array("id"=>'id',"description"=>'description')));
        $this->view->bookshopLocationList= $this->model->selector(array("table"=>'location',"fields"=>array("id"=>'id',"description"=>'location as description')));
        
        if(isset($id) && !empty($id) && is_numeric($id)){
            
            if($this->view->request->method==='POST' && !empty($this->view->request->data)){
                $this->view->request->data['operation']='UPDATE';
                $this->view->request->data['where']=array("id"=>$id,"is_current"=>1);
                $this->view->request->data['id']=$id;
                $this->view->message = $this->model->save($this->view->request->data);
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($this->view->message);

            }else{
                $this->view->render('header');
                $this->view->render('Settings/edit',array("variables"=>$this->view->debug));
                $this->view->render('footer');
            }
            
        }else{
            $this->view->redirect('Error/index/500');
        }
    }
    
    public function editSave($id)
    {
        $data = array();
        $data['id'] = $id;
        $data['userid'] = $id;
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];
        
        // @TODO: Do your error checking!
        
        $this->model->editSave($data);
       
        header('location: ' . URL . 'Settings');
    }
    
    public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . URL . 'Settings');
    }    
    
    
    
}