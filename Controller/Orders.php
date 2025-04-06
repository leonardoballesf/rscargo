<?php
/**
 * @name OrdersController 
 * @author YONY ACEVEDO
 * @description Controlador que se encarga de procesar las solicitudes relacionadas 
 * a los Pedidos de Mercancia de la Empresa
 */
    
class OrdersController extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->role=array(1=>'Usuario',2=>'Administrador',3=>'Super Administrador');
        $this->view->status=array(0=>'Inactivo',1=>'Activo');
        $this->view->statusClass=array(0=>'label label-danger',1=>'label label-success');
        
    }
        
    public function index(){    
        $this->view->app->js = array(
            'js/Orders/Orders.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Orders/Orders.css',
            'css/default.css' 
        );
        
        $this->view->List = $this->model->findAll();
        
        $this->view->title = 'Listado de Pedidos';
        $this->view->render('header');
        $this->view->render('Orders/index');
        $this->view->render('footer');        
        
    }
    
    public function ordersJson() 
    {   
        $list=$this->model->findByParams($this->view->request->data);
        
        foreach ($list['data'] as $key => $value) {
            
            $list['data'][$key]=array(
                'id'=> $value->orders_id,
                'description'=> "<small>".$value->orders_description."</small>",
                'identity_card'=> "<small>".$value->orders_identity_card."</small>",
                'address'=> "<small>".$value->orders_address."</small>",
                'phone'=> "<small>".$value->sellers_phone."</small>",
                'birthdate'=> "<small>".date('d/m/Y', strtotime($value->sellers_birthdate))."</small>",
                'users_id'=> $value->sellers_users_id,
                'is_active'=> $value->sellers_is_active,
                'estatus'=> "<span class=\"".$this->view->statusClass[$value->sellers_is_active]."\"><small>".$this->view->status[$value->sellers_is_active]."</small></span>",
                'created'=> "<small>".date('d/m/Y', strtotime($value->sellers_created))."</small>",
                'hour'=> "<small>".date('g:i:s A', strtotime($value->sellers_created))."</small>",
                'opciones'=> '
                <div class="btn-group">
                    <button type="button" class="btn btn-default text-danger-lighter light" onclick="location.href=\'Sellers/edit/'.$value->sellers_id.'\'">
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
        $data = array();
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];
        
        // @TODO: Do your error checking!
        
        $this->model->create($data);
        header('location: ' . URL . 'Orders');
    }
    
    public function edit($id) 
    {
        $this->view->title = 'Editar Pedido';
        $this->view->orders = $this->model->find($id);
        
        $this->view->render('header');
        $this->view->render('Orders/edit');
        $this->view->render('footer');
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
       
        header('location: ' . URL . 'Orders');
    }
    
    public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . URL . 'Orders');
    }
}