<?php

class NominalsController extends Zend_Controller_Action
{

	public function init(){
	    $this->_helper->layout->disableLayout();
		$this->view->subMenuId = 'nominals';
		$this->view->menuId = 'options';		
		$config = new Zend_Config_Ini('../application/configs/application.ini', 'staging');	
		$this->base_url = $config->appUrl->path;
		$this->view->base_url = $config->appUrl->path;			
	}

	public function indexAction(){
		$nom = new Model_DbTable_Nominals();
		$this->view->rows = $nom->getNominals();
	}

	public function getAction(){
		$this->_helper->layout->disableLayout();
		$nom = new Model_DbTable_Nominals();
		$this->view->rows = $nom->getNominals();
	}

	public function messageAction(){
	}

	public function saveAction(){
		$request = $this->getRequest();
		$id = $request->getParam('id');
		$sum = $request->getParam('nominals');

		$nom = new Model_DbTable_Nominals;

		$nom->updateNominal($id, $sum);
	}


}

