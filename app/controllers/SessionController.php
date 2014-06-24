<?php 
namespace Learn\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
use Learn\Auth\Exception as AuthException;
use Learn\Models\Users;
class SessionController extends ControllerBase
{

	public function initialize()
	{
		$this->view->setTemplateBefore('public');
	}
	public function indexAction()
	{

	}
	/**
     * Allow a user to signup to the system
     */
    public function signupAction()
    {
    	try{
    		if($this->request->isPost())
    		{
    			print_r($this->request->getPost());
    			$user = new Users();
    			 $user->assign(array(
    			 	'firstName'	=>	$this->request->getPost('first_name','striptags'),
    			 	'lastName'	=>	$this->request->getPost('last_name','striptags'),
    			 	'userName'	=>	$this->request->getPost('user_name','striptags'),
    			 	'email'		=>	$this->request->getPost('email','email'),
    			 	'password'	=>	'sd',
    			 	'mustChangePassword'=> 'N',
    			 	'profilesId'=>	'2',
    			 	'banned'	=>	'N',
    			 	'suspended'	=>	'N',
    			 	'active'	=>	'N'

    			 	));
    			 if($user->save())
    			 {
    			 	return $this->response->redirect('session/signin');
    			 }
    			 else{
    			 	foreach ($user->getMessages() as $value) {
    			 		echo $value;
    			 	}
    			 	$this->view->disable();
    			 }
    			
    		}
    	}catch (AuthException $e)
    	{
    		
    		$this->flash->error($e->getMessage());
    	}

    }
    public function signinAction()
    {

    	
    	try{
    		if($this->request->isPost())
    		{
    			print_r($this->request->getPost());
                $this->view->disable();
    		}
    	}catch (AuthException $e)
    	{
    		$this->flash->error($e->getMessage());
    	}
    }
}