<?php

  require_once './Auth/user.php';

  // login function
  if(isset($_POST['username']) && isset($_POST['password'])){
    login($_POST['username'], $_POST['password'], './push.php');
  }


  // if user logged in redirect to push page
  if(isset($_SESSION['user'])){
    header('Location: ./push.php');
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Principal Login</title>

    <link rel="stylesheet" href="./resources/css/login.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
    <script src="https://kit.fontawesome.com/7d40304bdb.js"></script>
    
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>

  <div class="container">
  <form class="login" action="login.php" method="POST">

    <?= csrfToken(); ?>


  <fieldset>

  	<legend class="legend">Login</legend>

    <div class="input">
    	<input type="username" placeholder="Username" name="username" required />
      <span><i class="fa fa-envelope-o"></i></span>
    </div>

    <div class="input">
    	<input type="password" placeholder="Password" name="password" required />
      <span><i class="fa fa-lock"></i></span>
    </div>

    <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>

  </fieldset>

  </form>
  </div>

  <script
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

</script>

  </body>
</html>
