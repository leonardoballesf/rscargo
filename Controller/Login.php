<?php

class LoginController extends Controller {

    function __construct() {
        parent::__construct();  
        
        $this->view->template->js = array(
        /*<!-- jQuery -->*/
        'vendor/jquery/jquery-1.11.1.min.js',
        'vendor/jquery/jquery_ui/jquery-ui.min.js',
        /*<!-- jQuery Validate Plugin-->*/
        'assets/admin-tools/admin-forms/js/jquery.validate.min.js',
        /*<!-- jQuery Validate Addon -->*/
        'assets/admin-tools/admin-forms/js/additional-methods.min.js',
        /*<!-- HighCharts Plugin -->*/
        'vendor/plugins/highcharts/highcharts.js',
        'vendor/plugins/pnotify/pnotify.js',            
        /*<!-- Theme Javascript -->*/
        'assets/js/utility/utility.js',
        'assets/js/demo/demo.js',
        'assets/js/main.js'
        );

        $this->view->template->css = array(
          /*<!-- Theme CSS -->*/
         'assets/skin/default_skin/css/theme.css', 
         'assets/skin/default_skin/css/theme2.css',
         'assets/skin/default_skin/css/theme3.css', 
         /*<!-- Admin Forms CSS -->*/
         'assets/admin-tools/admin-forms/css/admin-forms.min.css'
        );
        
    }
    
    function index() 
    {   
        $this->view->title = 'Inicio de Sesión';
        $this->view->render('Login/index');
        
    }
    
    function Logout()
    {
        Session::destroy();
        header('location: ' . URL .  'Login');
        exit;
    }
    
    function run()
    {
        $response=$this->model->run();
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($response);
    }

}