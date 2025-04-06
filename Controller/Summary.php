<?php

class SummaryController extends Controller {
    
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        
    }
    
    public function index() {
        
        $this->view->app->js = array(
            'js/Summary/Summary.js',
            'js/custom.js'
        );

        $this->view->app->css = array(
            'css/Summary/Summary.css',
            'css/default.css' 
        );
        
        $this->view->summary_daily = $this->model->getSummaryDaily();

        $this->view->summary_month = $this->model->getSummaryMonth();


        $this->view->title = 'Inicio';
        $this->view->render('header');
        $this->view->render('Summary/index');
        $this->view->render('footer');        
        
    }
    
}