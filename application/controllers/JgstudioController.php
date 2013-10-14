<?php

class JgstudioController extends Zend_Controller_Action
{

    public function init(){
        $this->_helper->layout->disableLayout();
    }

    public function getAction(){
        echo json_encode(array('session_id' => uniqid()));
        die;
    }

    public function addAction(){
        die;
    }

    public function getrndAction(){
        die();
    }

    public function boockAction(){
        
    }

}