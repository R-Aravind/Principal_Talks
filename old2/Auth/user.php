<?php

require_once 'config.php';


session_start();


// login function
function login($user_name, $password, $redirect='../index.php'){

  if(!empty($user_name) && !empty($password)){
    if($_SESSION['token'] == $_POST['token']){
      if($user_name === Auth\USER_NAME && $password === Auth\PASSWORD){
        $_SESSION['user'] = $user_name;
        $_SESSION['login_status'] = 'Sucessful';
        header('Location: '. $redirect);
      }else{
        $_SESSION['login_status'] = 'Incorrect username or password';
      }
    }else{
      $_SESSION['login_status'] = 'Token error';
    }
  }
  else {
    $_SESSION['login_status'] = 'Username and password should not be empty';
  }
}

// csrf token generator
function csrfToken(){
  $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(24));
  return '<input type="hidden" name="token" value="'.$_SESSION['token'].'" />'; 
}


// auth filter
function auth($redirect){
  if(!isset($_SESSION['user'])){
    header('Location: '. $redirect);
    die();
  }
}

// user logout
function logout($redirect){
  session_destroy();
  header('Location: '. $redirect);
}

if(isset($_REQUEST['logout'])){ 
  logout('./login.php');
}


//DOC//
/*

login(username, password, redirect) -> login user
auth(redirect) -> check user is currently logged in otherwise redirect
csrfToken() -> generate a csrf input
logout() -> logout user
?logout -> logout user

*/
//////
?>
