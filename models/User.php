<?php
class UserModel extends Model{

	public function checkPass($str){
		$user_mail = $_SESSION['user_data']['mail'];
		$this->connectDB();
		$this->query = "select * from users where user_mail = '$user_mail' and user_pass = '$str'";
		$this->sendQuery();
		$count = $this->returnCount();
		if($count == 0){
			Message::setMsg('Wrong password','danger');
			Helper::redirect('/user/index');
			exit();
		}
	}

	public function checkPayment(){
		$user_id = $_SESSION['user_data']['id'];
		$this->connectDB();
		$this->query = "select * from payment where user_id = '$user_id'";
		$this->sendQuery();
		$count = $this->returnCount();
		return $count;
	}


	public function index(){

		$user_id = $_SESSION['user_data']['id'];
		$this->connectDB();
		$this->query = "select address from address where user_id = '$user_id'";
		$this->sendQuery();
		$row = $this->getAllRow();

		$this->query = "select * from payment where user_id = '$user_id'";
		$this->sendQuery();
		$pay = $this->getRow();


		if($_POST['submit']==='submit_payment'){
			$card_holder = $_POST['card_holder'];
			$card_type = $_POST['card_type'];
			$card_number = $_POST['card_number'];
			$valid_month = $_POST['valid_month'];
			$valid_year = $_POST['valid_year'];
			$cve = $_POST['cve'];

			if(!$this->checkPayment()){
				$this->query = "insert into payment(user_id, card_holder, card_type, card_number, valid_month, valid_year, cve)
							values('$user_id','$card_holder', '$card_type', '$card_number', '$valid_month', '$valid_year', '$cve')";
			}else{
				$this->query = "update payment set card_holder = '$card_holder', card_type = '$card_type', card_number = '$card_number',
								valid_month = '$valid_month', valid_year = '$valid_year', cve = '$cve' where user_id = '$user_id' ";
			}
			$this->sendQuery();

			Message::setMsg('Your payment method has been added','success');
			Helper::redirect('/user/index');
			exit();

		}

		if($_POST['submit']==='Save'){
			$this->checkPass($_POST['user_pass']);
			if(!empty($_POST['new_user_pass'])){
				$new_pass = $_POST['new_user_pass'];
				$this->query = "update users set user_pass = '$new_pass' where user_id = '$user_id'";
				$this->sendQuery();
				Message::setMsg('Your password has been changed','success');
				Helper::redirect('/user/index');
				exit();
			}else{
				$address = $_POST['user_address'];
				$this->query = "insert into address(user_id, address) values('$user_id', '$address')";
				$this->sendQuery();
				Message::setMsg("Your address has been added", "success");
				Helper::redirect("/user/index");
				exit();
			}
		}


		$user[] = $row;
		$user[] = $pay;
		return $user;
	}

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
				$_SESSION['user_data']['id'] = $user['user_id'];
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

			$valid = Helper::checkPassLen($user_pass);
			if(!$valid){
				Helper::redirect('/user/login');
				exit();
			}

			$this->connectDB();
			$this->query = "INSERT INTO users(user_name, user_mail, user_pass) VALUES('$user_name', '$user_mail', '$user_pass')";
			$this->sendQuery();


			Message::setMsg('Your account has been created','success');
			Helper::redirect('/user/login');
			exit();
		}
	}
}
?>