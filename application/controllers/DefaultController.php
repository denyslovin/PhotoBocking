<?php

class DefaultController extends Zend_Controller_Action
{

	public function init(){
	$this->_helper->layout->disableLayout();
		$this->view->subMenuId = '';
		$this->view->menuId = '';
		$config = new Zend_Config_Ini('../application/configs/application.ini', 'staging');	
		$this->base_url = $config->appUrl->path;
		$this->view->base_url = $config->appUrl->path;		
	}

}

