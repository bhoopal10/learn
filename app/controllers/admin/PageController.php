<?php 
namespace Learn\Controllers\admin;
use Learn\Models\ChannelPage;
class PageController extends ControllerAdmin
{

	public function initialize()

	{
		$this->view->setLayout('index');
	}

	public function createAction($id=null)
	{
		if($val=$this->request->getPost())
		{
				print_r($val);
				$this->view->disable();
		}
		else
		{
			if($this->request->get())
			{
				if($id)
				{
					if(channelPage::findFirst($id))
					{
						$this->view->setVar('id',$id);
					}
					else
					{
					$this->view->setVar('id','');
					}
				}
				else
				{
					return $this->response->redirect('index/notFound');
				}
			}
		}

		
	}
	public function PageByIdAction($id)
	{
		if($id)
		{
			$page=ChannelPage::findFirst($id);
			echo json_encode($page);
			$this->view->disable();
		}
		else
		{
			return $this->response->redirect('index/notFound');
		}
	}
}