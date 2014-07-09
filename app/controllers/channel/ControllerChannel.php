<?php 
namespace Learn\Controllers\channel;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
class ControllerChannel extends Controller
{
	public function beforeExecuteRoute()
	{
		if(!$this->auth->getIdentity())
		{
			return $this->response->redirect('session/signin');
		}
		if($this->auth->getGroup() != 'channel')
		{
			$group=$this->auth->getGroup();
			$this->flash->error('You don\'t have right to access ');
			return $this->response->redirect($group);
		}
	}
	public function afterExecuteRoute()
    {
        $this->view->setViewsDir($this->view->getVIewsDir() . 'channel/');
        /*
        check post through csrf security or not
        */
        // if($this->request->isPost())
        // {
        //     if (!$this->security->checkToken())
        //     {
        //         $this->flash->error('Document Expired');
        //         // $this->view->disable();
        //         return $this->response->redirect($_SESSION['Referer']);
        //     }
        // }
    }
}