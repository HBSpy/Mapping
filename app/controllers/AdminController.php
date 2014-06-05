<?php

class AdminController extends ControllerBase
{

	public function initialize(){
		if(!$this->session->get('_self')){
			$this->response->redirect('friend/login');
		}
	}
	
    public function indexAction(){
		$forms = Form::find(array(
			'order' => 'id DESC',
		));
		$this->view->forms = $forms;
    }

	public function friendAction(){
		if($this->request->isPost()){
			$friend = new Friend();
			$friend->user = $this->request->getPost('user');
			$friend->pass = md5('111111');

			if($friend->save()){
				$this->response->redirect('admin');
			}
		}
	}

	public function formAction($id = 0){
		if($form = Form::findFirst($id)){
			$this->view->form = $form;
			$form->read = TRUE;
			$form->save();
		}
	}

	public function starAction($id = 0){
		if($this->request->isPost()){
			if($form = Form::findFirst($id)){
				$form->star = !$form->star;
				if($form->save()){
					$this->ajaxReturn(array('status' => TRUE));
				}
			}
		}
	}

}

