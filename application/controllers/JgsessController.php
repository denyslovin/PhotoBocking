<?php

class JgsessController extends Zend_Controller_Action
{

    public function init(){
        $this->_helper->layout->disableLayout();
    }

    public function openAction(){
        echo json_encode(array('session_id' => uniqid()));
        die;
    }

    public function closeAction(){
        die;
    }

}