<?php
/**
 * @name MaintenanceController 
 * @author YONY ACEVEDO
 * @description Controlador que se encarga de procesar las solicitudes relacionadas 
 * a las tablas auxiliares dentro del sistema
 */
class MaintenanceController{

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    public function index() 
    {    
        $this->view->app->js = array(
            'js/Maintenance/Maintenance.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Maintenance/Maintenance.css',
            'css/default.css' 
        );        
        
        $this->view->title = 'Mantenimiento de Tablas Auxiliares';
        $this->view->render('header');
        $this->view->render('Maintenance/index');
        $this->view->render('footer');
    }    

    public function add() 
    {   
        $this->view->debug=$this->view->request;
        $variables=array("variables"=>$this->view->debug);
        
        $this->view->app->js = array(
        'js/Maintenance/Maintenance.js',
        'js/Maintenance/Add.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Maintenance/Maintenance.css',
        'css/default.css' 
        );

        $this->view->title = 'Agregar Datos';
        

        if($this->view->request->method==='POST' && !empty($this->view->request->data)){
            $this->view->request->data['operation']='CREATE';
            $this->view->request->data['business_id']= Session::get('business_id');
            $this->view->request->data['bookshop_id']= Session::get('bookshop_id');
            $this->view->request->data['users_id']= Session::get('userid');
            
            $this->view->message = $this->model->save($this->view->request->data);
            
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($this->view->message);
            
        }elseif($this->view->request->method==='GET'){
            $this->view->render('header');
            $this->view->render('Maintenance/index');
            $this->view->render('footer');
        }
    }
    
    public function edit($id) 
    {   
        $this->view->debug=$this->view->request;

        $this->view->app->js = array(
        'js/Maintenance/Maintenance.js',
        'js/Maintenance/Edit.js',
        'js/custom.js'
        );
        
        $this->view->app->css = array(
        'css/Maintenance/Maintenance.css',
        'css/default.css' 
        );

        $this->view->title = 'Editar Datos';
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
                $this->view->message = $this->model->save($this->view->request->data);
               
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($this->view->message);
                
                
            }elseif($this->view->request->method==='POST' && !empty($this->view->request->data) && !empty($this->view->request->data['operation'])=='ASSIGN'){
                unset($this->view->request->data['id']);
                $this->view->request->data['where']=array("users_id"=>$this->view->request->data['users_id'],"bookshop_id"=>$this->view->request->data['bookshop_id']);
                
                $this->view->message = $this->model->assign($this->view->request->data);
                
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($this->view->message);
                
            }
                
            if($this->view->request->method==='GET'){
                $this->view->render('header');
                $this->view->render('Maintenance/index',array("variables"=>$this->view->debug));
                $this->view->render('footer');
            }
            
            
        }else{
            $this->view->redirect('Error/index/500');
        }
    }

}
