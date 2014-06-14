<?php

class FriendController extends ControllerBase {

    public function indexAction(){
		if(!$this->session->get('friend')){
			$this->response->redirect('friend/login');
		}
    }

	public function loginAction(){
		if($this->session->get('friend')){
			$this->response->redirect('friend');
		}

		if($this->request->isGet()){
		}

		if($this->request->isPost()){
			$this->view->disable();
			if($friend = Friend::findFirstByUser($this->request->getPost('user'))){
				if($friend->pass == md5($this->request->getPost('pass'))){
					$this->session->set('friend', $friend);
					if($friend->user == 'HBSpy'){
						$this->session->set('_self', TRUE);
					}
					$this->ajaxReturn(array('status' => TRUE, 'redirect' => $this->url->get('friend')));
				} else {
					$this->ajaxReturn(array('status' => FALSE, 'message' => '密码错误'));
				}
			} else {
				$this->ajaxReturn(array('status' => FALSE, 'message' => '昵称不存在'));
			}
		}
	}

	public function logoutAction(){
		$this->session->destroy();
		$this->response->redirect('friend/login');
	}

	public function editAction(){
		if($this->request->isGet()){
			$this->response->redirect('friend');
		}

		if($this->request->isPost()){
			$friend = Friend::findFirst($this->session->get('friend')->id);
			$friend->user = $this->request->getPost('user');
			$friend->relation = $this->request->getPost('relation');

			if($this->request->getPost('pass')){
				$friend->pass = md5($this->request->getPost('pass'));
			}

			if($friend->save()){
				$this->flash->success('信息修改成功');
				$this->session->set('friend', $friend);
			}
		}
	}

	public function remarkAction($id = 0){
		if($this->request->isGet()){
			$remarks = Remark::find(array('order' => 'id DESC'));
			$this->view->remarks = $remarks;
		}

		if($this->request->isPost()){
			if($friend = $this->session->get('friend')){
				$remark = new Remark();
				$remark->remark = $this->request->getPost('remark');
				$remark->remark = emoji_unified_to_html($remark->remark);
				$remark->friend_id = $friend->id;

				if($remark->save()){
					$this->flash->success('评价成功');
				}
			}

			$remarks = Remark::find(array('order' => 'id DESC'));
			$this->view->remarks = $remarks;
		}

		if($this->request->isDelete()){
			$this->view->disable();
			if($remark = Remark::findFirst($id)){
				if($remark->friend_id == $this->session->get('friend')->id){
					if($remark->delete()){
						$this->ajaxReturn(array('status' => TRUE));
					}
				}
			}
		}
	}

}

