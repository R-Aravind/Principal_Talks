<?php

  include 'autoload.php';

  use \Application\Controller\LoginController;


  $admin = new LoginController();

  if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password)){


      if($admin->login($username, $password)){
        header('Location: push.php');
      }else{
        echo '<h4>Incorrect username or password</h4>';
      }
    }
  }

  if($admin->isLogin()){
    header('Location: push.php');
  }




?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Principal Login</title>

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
  <form class="login" action="login.php" method="POST">



    <div class="input">
    	<input type="username" placeholder="Username" name="username" required />
    </div>

    <div class="input">
    	<input type="password" placeholder="Password" name="password" required />
    </div>

    <input type="submit" class="submit" value="Login"> 
    <!-- Login</button> -->

  </form>
  </div>

  <!-- <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
  </script>

<script type="text/javascript">
  $(".input").focusin(function() {
  $(this)
    .find("span")
    .animate({ opacity: "0" }, 200);
  });

  $(".input").focusout(function() {
  $(this)
    .find("span")
    .animate({ opacity: "1" }, 300);
  });

</script> -->

  </body>
</html>
