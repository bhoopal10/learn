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
    $this->view->setLayout('public');
    }
    public function indexAction()
    {

    }
    /**
    * Allow a user to signup to the systems
    */
    public function signupAction()
    {
        $form                =array();/*Initail old input value null array*/
        try{
        if($this->request->isPost())
        {
            $user                = new Users();
            $username            =$this->request->getPost('user_name');
            $user->assign(array(
            'firstName'          =>	$this->request->getPost('first_name','striptags'),
            'lastName'           =>	$this->request->getPost('last_name','striptags'),
            'userName'           =>	$this->request->getPost('user_name','striptags'),
            'email'              =>	$this->request->getPost('email','email'),
            'password'           =>	$this->security->hash($this->request->getPost('password')),
            'mustChangePassword' => 'N',
            'banned'             =>	'N',
            'suspended'          =>	'N',
            'active'             =>	'Y',
            'group_id'           => '2'
            
            ));
            if($user->save())
            {

                 return $this->response->redirect('session/signin');
            }
            else
            {
                $form =$this->request->getPost();/* setting old input values */
                foreach ($user->getMessages() as $value) 
                {
                $this->flash->error($value);
                }
            }
        }
        }
        catch (AuthException $e)
        {
            $this->flash->error($e->getMessage());
        }
        $this->view->setVar("form",$form);
    }
    public function signinAction()
    {
        
        try{
            if(!$this->request->isPost())
            {
                if($this->auth->hasRememberMe())
                {
                    return $this->auth->loginWithRememberMe();
                }
            }
            else
            {
                    $auth      =$this->auth->check(array(
                    'email'    =>$this->request->getPost('user_name'),
                    'password' =>$this->request->getPost('password'),
                    'remember' =>$this->request->getPost('remember')
                    ));
                if($auth)
                {
                    if($this->auth->getGroup() == 'admin')
                    {
                        return $this->response->redirect('admin/index/index');
                    }
                    elseif($this->auth->getGroup ()== 'channel')
                    {
                       return $this->response->redirect('channel/index/index') ;
                    }
                }
            }
        }
        catch(AuthException $e)
        {
            $this->flash->error($e->getMessage());
        }


    }
    public function logoutAction()
    {
        $this->auth->remove();
        return $this->response->redirect('session/signin');
    }
}

