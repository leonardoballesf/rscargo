<?php
/**
 * @name ErrorController 
 * @author YONY ACEVEDO
 * @description Controlador que se encarga de procesar los errores de respuesta a peticiones http 
 */

class ErrorController extends Controller {

    function __construct() {
        parent::__construct(); 
    }
    
    function index($error=404) {
        
        switch ($error) {
            case 301:
                $this->view->title = 'Error '.$this->error.'';
                $this->view->msg = 'Página no Autorizada';
                $this->view->render('header');
                $this->view->render('Error/301');
                $this->view->render('footer');
                break;
            case 403:
                $this->view->title = 'Error '.$this->error.'';
                $this->view->msg = 'Página no Autorizada';
                $this->view->render('header');
                $this->view->render('Error/403');
                $this->view->render('footer');
                break;
            case 404:
                $this->view->title = 'Error '.$this->error.'';
                $this->view->msg = 'La página no existe';
                $this->view->render('header');
                $this->view->render('Error/404');
                $this->view->render('footer');
                break;
            case 500:
                $this->view->title = 'Error '.$this->error.'';
                $this->view->msg = 'Error al procesar la petición';
                $this->view->render('header');
                $this->view->render('Error/500');
                $this->view->render('footer');
                break;
        }
    }

}