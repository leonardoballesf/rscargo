<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of issuing_entity
 *
 * @author yonya
 */
class IssuingEntityController extends Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();    
        //$this->view->js = array('index/js/default.js');
        
    }
    
    
    
    public function index() {
        
        $this->view->template->js = array(
        /*<!-- jQuery -->*/
        'vendor/jquery/jquery-1.11.1.min.js',
        'vendor/jquery/jquery_ui/jquery-ui.min.js',
        /*<!-- HighCharts Plugin -->*/
        'vendor/plugins/highcharts/highcharts.js',
        /*<!-- Theme Javascript -->*/
        'assets/js/utility/utility.js',
        'assets/js/demo/demo.js',
        'assets/js/main.js'
        );
        
        $this->view->app->js = array(
        /*<!-- INDEX -->*/
        'js/issuingentity/index.js'
        );


        $this->view->template->css = array(
          /*<!-- Theme CSS -->*/
         'assets/skin/default_skin/css/theme.css', 
         'assets/skin/default_skin/css/theme2.css',
         'assets/skin/default_skin/css/theme3.css', 
         /*<!-- Admin Forms CSS -->*/
         'assets/admin-tools/admin-forms/css/admin-forms.min.css',
         /*<!-- Glyphicons Pro CSS(font) -->*/
         'assets/fonts/glyphicons-pro/glyphicons-pro.css',
         /*<!-- Icomoon CSS(font) -->*/
         'assets/fonts/icomoon/icomoon.css',
         /*<!-- Iconsweets CSS(font) -->*/
         'assets/fonts/iconsweets/iconsweets.css',
         /*<!-- Octicons CSS(font) -->*/
         'assets/fonts/octicons/octicons.css',
         /*<!-- Stateface CSS(font) -->*/
         'assets/fonts/stateface/stateface.css'
        );           
        
        //echo Hash::create('sha256', 'jesse', HASH_PASSWORD_KEY);
        //echo Hash::create('sha256', 'test2', HASH_PASSWORD_KEY);
        $this->view->title = 'Inicio';
        
        $this->view->render('header');
        $this->view->render('issuingentity/index');
        $this->view->render('footer');        
        
    }
    
  
    
    
}
