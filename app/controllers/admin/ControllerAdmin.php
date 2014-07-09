<?php 
namespace Learn\Controllers\admin;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

class ControllerAdmin extends Controller
{
    
	public function beforeExecuteRoute()
	{

		if(!$this->auth->getIdentity())
		{
			return $this->response->redirect('session/signin');
		}
		if($this->auth->getGroup()!='admin')
		{
			$profile=$this->auth->getGroup();
			$this->flash->error('You don\'t have right to access admin');
			return $this->response->redirect($profile);
		}
	}
	public function afterExecuteRoute()
    {
        $this->view->setViewsDir($this->view->getVIewsDir() . 'admin/');
        /*
        check post through csrf security or not
        */
        if($this->request->isPost())
        {
            if (!$this->security->checkToken())
            {
                $this->flash->error('Document Expired');
                // $this->view->disable();
                return $this->response->redirect($_SESSION['Referer']);
            }
        }
    }
}