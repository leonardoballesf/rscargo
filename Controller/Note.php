<?php

class NoteController extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }
    
    public function index() 
    {   
        $this->view->title = 'Notes';
        $this->view->noteList = $this->model->noteList();
       
        $this->view->render('header');
        $this->view->render('Note/index');
        $this->view->render('footer');
    }
    
    public function create() 
    {
        $data = array(
            'title' => $_POST['title'],
            'content' => $_POST['content']
        );
        $this->model->create($data);
        header('location: ' . URL . 'note');
    }
    
    public function edit($id) 
    {
        $this->view->note = $this->model->noteSingleList($id);
    
        if (empty($this->view->note)) {
            die('This is an invalid note!');
        }
        
        $this->view->title = 'Edit Note';
        
        $this->view->render('header');
        $this->view->render('note/edit');
        $this->view->render('footer');
    }
    
    public function editSave($noteid)
    {
        $data = array(
            'noteid' => $noteid,
            'title' => $_POST['title'],
            'content' => $_POST['content']
        );
        
        // @TODO: Do your error checking!
        
        $response=$this->model->editSave($data);
        
        $this->view->msg = 'Listo '.$response;
        
        $this->index();
       
        
        //$this->view->msg = 'Listo';
        //header('location: ' . URL . 'note');
    }
    
    public function delete($id)
    {
        $data['noteid']=$id;
        $response=$this->model->delete($data);
        
        $this->view->msg = 'Listo '.$id;
        
        $this->index();
        
        //header('location: ' . URL . 'note');
    }
}