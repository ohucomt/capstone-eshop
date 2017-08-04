<?php
class User extends Controller{
	protected function login(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login(), true);
	}

	protected function register(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(), false);
	}

	protected function logout(){
		session_destroy();
		session_start();
		Message::setMsg('Logout successfully','success');
		Helper::redirect();
		exit();
	}


	protected function index(){
		Helper::loginCheck();
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->index(), true);
	}

}
?>