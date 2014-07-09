<?php 
namespace Learn\Controllers;

class UserController extends ControllerBase
{
	public function beforeExecuteRoute()
	{
		if(!$this->auth->getIdentity())
		{
			return $this->response->redirect('session/signin');
		}
	}
	
	public function indexAction()
	{
		echo "index";
		print_r($this->auth->getIdentity());
		$this->view->disable();
	}
}