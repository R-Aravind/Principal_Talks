<?php

  include 'autoload.php';

  use \Application\Model\Admin;


  $admin = new Admin();

  if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)){
      if($admin->addAdmin($email, $password)){
        header('Location: login.php');
      }else{
        echo '<h4>Error creating admin</h4>';
      }
    }
  }


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Principal Signup</title>

    <link rel="stylesheet" href="./resources/stylesheets/css/login.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
    <script src="https://kit.fontawesome.com/7d40304bdb.js"></script>
    
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>

  <header>
		<h1 class="main-heading">
			<!-- <div class="logo">LOGO</div> -->
			<div class="caption">Principal Talks</div>
		</h1>
	</header>

  <div class="container">
  <form class="login" action="admin-signup.php" method="POST">



    <div class="input">
    	<input type="email" placeholder="Email" name="email" required />
    </div>

    <div class="input">
    	<input type="password" placeholder="Password" name="password" required />
    </div>


    <input type="submit" class="submit" value="SignUp"> 
    <!-- Login</button> -->

  </form>
  </div>



  </body>
</html>
