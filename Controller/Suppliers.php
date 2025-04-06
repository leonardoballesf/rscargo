<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SuppliersController
 *
 * @author yonya
 */
class SuppliersController extends Controller {
    
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->role=array(1=>'Usuario',2=>'Encargado',3=>'Administrador');
        $this->view->status=array(1=>'Activo',2=>'Inactivo');
        $this->view->statusClass=array(1=>'label label-success',2=>'label label-danger');
        $this->view->gender=array(1=>'Masculino',2=>'Femenino');
    }
        
    public function index() 
    {    
        $this->view->app->js = array(
            'js/Suppliers/Suppliers.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Suppliers/Suppliers.css',
            'css/default.css' 
        );
       
        $this->view->title = 'Listado de Proveedores';
        $this->view->render('header');
        $this->view->render('Suppliers/index');
        $this->view->render('footer');
    }
    
    public function suppliersjson() 
    {   
        $list=$this->model->findByParams($this->view->request->data);
        
        foreach ($list['data'] as $key => $value) {
            
            $list['data'][$key]=array(
                'id'=> $value->suppliers_id,
                'description'=> "<small>".$value->suppliers_description."</small>",
                'identity_card'=> "<small>".$value->suppliers_identity_card."</small>",
                'address'=> "<small>".$value->suppliers_address."</small>",
                'phone'=> "<small>".$value->suppliers_phone."</small>",
                'facsimile'=> "<small>".$value->suppliers_facsimile."</small>",
                'users_id'=> $value->suppliers_users_id,
                'is_active'=> $value->suppliers_is_active,
                'estatus'=> "<span class=\"".$this->view->statusClass[$value->suppliers_is_active]."\"><small>".$this->view->status[$value->suppliers_is_active]."</small></span>",
                'created'=> "<small>".date('d/m/Y', strtotime($value->suppliers_created))."</small>",
                'hour'=> "<small>".date('g:i:s A', strtotime($value->suppliers_created))."</small>",
                'opciones'=> '
                <div class="btn-group">
                    <button type="button" class="btn btn-default text-danger-lighter light" onclick="location.href=\'Suppliers/edit/'.$value->suppliers_id.'\'">
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
        'js/Suppliers/Suppliers.js',
        'js/Suppliers/Add.js',
        'js/custom.js'
        );

        $this->view->app->css = array(
        'css/Suppliers/Suppliers.css',
        'css/default.css' 
        );

        $this->view->title = 'Agregar Proveedor';
        $this->view->bookshopList= $this->model->selector(array("table"=>'bookshop',"fields"=>array("id"=>'id',"description"=>'description')));
        $this->view->bookshopRegionsList= $this->model->selector(array("table"=>'regions',"fields"=>array("id"=>'id',"description"=>'description')));
        $this->view->bookshopLocationList= $this->model->selector(array("table"=>'location',"fields"=>array("id"=>'id',"description"=>'location as description')));
            
        if($this->view->request->method==='POST' && !empty($this->view->request->data)){
            $this->view->request->data['operation']='CREATE';
            $this->view->request->data['suppliers_business_id']= Session::get('business_id');
            $this->view->request->data['suppliers_users_id']= Session::get('userid');
            $this->view->request->data['unique']= array('identity_card');
            
            $this->view->message = $this->model->save($this->view->request->data);
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($this->view->message);
            
        }elseif($this->view->request->method==='GET'){
            $this->view->render('header');
            $this->view->render('Suppliers/add');
            $this->view->render('footer');
        }
    }
    
    public function edit($id) 
    {   
        $this->view->debug=$this->view->request;

        $this->view->app->js = array(
        'js/Suppliers/Suppliers.js',
        'js/Suppliers/Edit.js',
        'js/custom.js'
        );
        
        $this->view->app->css = array(
        'css/Suppliers/Suppliers.css',
        'css/default.css' 
        );

        $this->view->title = 'Editar Proveedor';
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
                $this->view->render('Suppliers/edit',array("variables"=>$this->view->debug));
                $this->view->render('footer');
            }
            
        }else{
            $this->view->redirect('Error/index/500');
        }
    }    
    
    
    
}
