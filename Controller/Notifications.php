<?php
/**
 * @name NotificationsController 
 * @author YONY ACEVEDO
 * @description Controlador que se encarga de procesar las solicitudes relacionadas 
 * a los Paquetes
 */
class NotificationsController extends Controller{
    
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->customerType=array(1=>'Natural',2=>'Juridico',3=>'Extranjero');
        $this->view->status=array(1=>'Activo',2=>'Inactivo');
        $this->view->statusDelivered=array(1=>'Bodega',2=>'Transito',3=>'Retirado');
        $this->view->statusDeliveredClass=array(1=>'label label-primary',2=>'label label-warning',3=>'label label-success');

        $this->view->notificationsType=array(0=>'No envíado',1=>'Envíado');
        $this->view->notificationsClass=array(0=>'label label-danger',1=>'label label-success');
        $this->view->statusClass=array(1=>'label label-success',2=>'label label-danger');
    }

    public function index() 
    {    
        $this->view->app->js = array(
            'js/Notifications/Notifications.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Notifications/Notifications.css',
            'css/default.css' 
        );        
        
        //print_r($this->view->paymentMethods);exit;

        $this->view->title = 'Listado de Notificaciones';
        $this->view->render('header');
        $this->view->render('Notifications/index');
        $this->view->render('footer');
    }    
    
    public function notificationsjson() 
    {   
        $list=$this->model->findByParams($this->view->request->data);
        
        foreach ($list['data'] as $key => $value) {
            
            $list['data'][$key]=array(
                'id'=> $value->notifications_id,
                'from_email'=> "<small>".$value->notifications_from_email."</small>",
                'name'=> "<small>".$value->notifications_name."</small>",
                'to_email'=> $value->notifications_to_email,
                'sent'=> "<span class=\"".$this->view->notificationsClass[$value->notifications_sent]."\"><small>".$this->view->notificationsType[$value->notifications_sent]."</small></span>",
                'created'=> "<small>".date('m/d/Y g:i:s A', strtotime($value->notifications_created))."</small>"
            );
        }
        
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($list,JSON_PRETTY_PRINT);
        exit();

    }
    
}