<?php

class FormController extends ControllerBase {

    public function indexAction(){
		if($this->request->isGet()){

		}

		if($this->request->isPost()){
			$form = new Form();
			$form->ip = inet_pton($this->getIP());		
			$form->form = json_encode($this->request->getPost());
			$form->read = FALSE;
			$form->star = FALSE;

			if($form->save()){
				$this->flash->success("十分感谢您的参与，我将尽快给予您答复 >_<");
			}
		}
    }

}

