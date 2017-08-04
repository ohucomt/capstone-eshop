<?php
	class Helper{
		public static function redirect($dst){
			if(empty($dst)){
				header("Location: ".ROOT_PATH);
			}else{
				header("Location: ".ROOT_PATH.$dst);
			}
		}

		public static function loginCheck(){

			if(!$_SESSION['is_login']){
				Message::setMsg("You must login first", "danger");
				Helper::redirect("/user/login");
				exit;
			}
		}

		public static function checkPassLen($str){
			$result = true;
			if(strlen($str) < 8 || strlen($str) > 32){
				Message::setMsg("Your password must be longer than 8 and less than 32", "danger");
				$result = false;
			}

			return $result;
		}

		public static function clear($string){
			return htmlentities($string);
		}

		public static function checkEmpty($post){
			if($post){
				foreach($post as $item => $value){
				if(empty($value)){
					Message::setMsg("You can not leave there fied blank", "danger");
					Helper::redirect("user/register");
					exit();
				}
			}
			}
		}


	}
?>