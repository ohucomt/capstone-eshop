<?php
class UserModel extends Model{
	public function login(){
		$post = $_POST;
		if($post['submit']){
			$user_mail = $post['user_mail'];
			$user_pass = $post['user_pass'];

			$this->connectDB();
			$this->query = "SELECT * FROM users where user_mail = '$user_mail' AND user_pass = '$user_pass'";
			$this->sendQuery();

			$row = $this->returnCount();
			if($row){
				$user = $this->getRow();
				$_SESSION['is_login'] = 1;
				$_SESSION['user_data']['name'] = $user['user_name'];
				$_SESSION['user_data']['mail'] = $user['user_mail'];

				Message::setMsg('Login successfully','success');
				Helper::redirect();
				exit();
			}else{
				Message::setMsg('Wrong username or password','danger');
				Helper::redirect('/user/login');
				exit();
			}

			
		}
	}

	public function register(){
		if($_POST['submit']){
			$user_name = $_POST['user_name'];
			$user_mail = $_POST['user_mail'];
			$user_pass = $_POST['user_pass'];

			$this->connectDB();
			$this->query = "INSERT INTO users(user_name, user_mail, user_pass) VALUES('$user_name', '$user_mail', '$user_pass')";
			$this->sendQuery();

			$_SESSION['is_login'] = 1;
			$_SESSION['user_data']['name'] = $_POST['user_name'];
			$_SESSION['user_data']['mail'] = $_POST['user_mail'];

			Message::setMsg('Your account has been created','success');
			Helper::redirect();
			exit();
		}
	}
}
?>