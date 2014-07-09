<?php
namespace Learn\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

/**
 * ControllerBase
 * This is the base controller for all controllers in the application
 */
class ControllerBase extends Controller
{
	 public function afterExecuteRoute()
    {
        $user=$this->auth->getIdentity();
        if($user)
        {

        }

    }

    /**
     * Execute before the router so we can determine if this is a provate controller, and must be authenticated, or a
     * public controller that is open to all.
     *
     * @param Dispatcher $dispatcher
     * @return boolean
     */
    public function beforeExecuteRoute()
    {
        /*
        check post through csrf security or not
        */
        // if($this->request->isPost())
        // {
        //     if (!$this->security->checkToken())
        //     {
        //         $this->flash->notice('Document Expired');
        //         // $this->view->disable();
        //         return false;
        //     }
        // }
    }
    public function indexAction()
    {
        
        $this->view->disable();
    }
}
