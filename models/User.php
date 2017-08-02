<?php
class UserModel extends Model{
	public function login(){
		return;
	}

	public function register(){
		if($_POST['submit']){
			print_r($_POST);
		}
	}
}
?>