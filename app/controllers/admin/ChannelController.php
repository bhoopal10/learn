<?php 
namespace Learn\Controllers\admin;
use Phalcon\Mvc\View;
use Learn\Models\ChannelPage;
use Learn\Models\Channel,
	Learn\Models\Users;

class ChannelController extends ControllerAdmin
{
	public function initialize()
	{
		$this->view->setLayout('index');
	}
	public function createAction()
	{

		try{
			if($this->request->getpost())
			{
				
				$this->db->begin();
				$user 	=	new Users();
				$user->assign(array(
					'firstName'			=>$this->request->getPost('ch_name','striptags'),
					'userName'			=>$this->request->getPost('ch_email','email'),
					'email'				=>$this->request->getPost('ch_email','email'),
					'password'			=>$this->security->hash($this->request->getPost('password')),
					'mustChangePassword' => 'N',
		            'profilesId'         =>	'2',
		            'banned'             =>	'N',
		            'suspended'          =>	'N',
		            'active'             =>	'Y',
		            'group_id'           => '2'
					));
				if(!$user->save())
				{
					$this->db->rollback();
					foreach($user->getMessages() as $message)
					{
						$this->flash->error($message);
					}
					return;
				}
				// getting userId
				$id 		=	$user->id;
				$channel 	=	new Channel();
				$channel->assign(array(
					'userId'	=>	$id,
					'name'		=>	$this->request->getPost('ch_name','striptags')						
					));
				if(!$channel->save())
				{
					$this->db->rollback();
					foreach($channel->getMessages() as $message)
					{
						$this->flash->error($message);
					}
					return;
				}
				// Getting channel id
				$channelId 	=	$channel->id;
				$slug		=	new ChannelPage();
				$slug->assign(array(
					'channelId'	=>	$channelId,
					'slug'	=>	$this->request->getPost('slug_name','striptags')
					));
				if(!$slug->save())
				{
					$this->db->rollback();
					foreach($slug->getMessages() as $message)
					{
						$this->flash->error($message);
					}
					return;
				}
				$this->db->commit();
				$this->flash->success('Channel was created successfully');
				return $this->response->redirect('admin/channel/view');
				
			}
		}catch(AuthException $e){
			$this->flash->error($e->getMessages());
		}
	}
	public function viewAction()
	{
		$total_channel=Channel::count();
		$this->view->setVar('total_channel',$total_channel);
		if($this->request->isPost())
		{
			$currentPage                =$this->request->getPost('currentPage','int',1);
			$perPage                    =$this->request->getPost('perPage','int',3);
			$offset                     = ($currentPage ==1 ? 0: ($currentPage-1)*$perPage);
			$user                       = Channel::find(array(
														'limit'=>array(
															'number'=>$perPage,
															'offset'=>$offset
															)
														));
			$arrs                       =array();
			foreach($user as $value)
			{	
				$arr['page']                =$value->page->toArray();
				$arr['user']                =$value->user->toArray();
				$arr['channel']             =$value->toArray();
				array_push($arrs,$arr);
			}
			$ar                         = json_encode($arrs);
			$response                   = new \Phalcon\Http\Response();
			$response->setStatusCode(200, "OK");
			$response->setContent($ar);
			$response->send();
			$this->view->disable();
			return;
		}

	}
	 
	public function deleteAction($id)
	{
		
		$channel=Channel::findFirst($id);
		if($channel)
		{
			if(!$channel->delete())
			{
				foreach ($channel->getMessages() as $message)
				{
					$this->flash->error($message);
				}
				return $this->response->redirect($_SERVER['HTTP_REFERER']);
			}
			$this->flash->success('Successfully deleted');
			return $this->response->redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
			$this->flash->error('Sorry unable to delete');
					return $this->response->redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function testAction()
	{
		if($this->request->isPost())
		{
			echo "hello";
			$this->view->disable();
		}
		else
		{
			echo "not hello";
			$this->view->disable();
		}
	}
}