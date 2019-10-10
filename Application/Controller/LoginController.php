<?php

namespace Application\Controller;

use \Application\Model\Admin;

class LoginController{

	function __construct(){
		session_start();
	}

	//login user
	public function login(string $email, string $password){
		$adminModel = new Admin;

		session_regenerate_id();

		if($_SESSION['user_id'] = $adminModel->authenticate($email, $password)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//logout user
	public function logout(){
		session_unset();
	}

	//check a user is logged in
	public function isLogin(){
		if(isset($_SESSION['user_id'])){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	

}