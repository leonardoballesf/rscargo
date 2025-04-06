<?php

class IndexController extends Controller {
    
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        
    }
    
    public function index() {
        
        $this->view->app->js = array(
            'js/Index/Index.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Index/Index.css',
            'css/default.css' 
        );
        
        $this->view->title = 'Inicio';
        $this->view->render('header');
        $this->view->render('Index/index');
        $this->view->render('footer');        
        
    }
    
}