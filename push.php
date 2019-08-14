<?php

  require_once './Auth/user.php';
  auth('./login.php'); //authentication required

  require_once './Model/post.php';


  // create new post
  if(isset($_POST['content'])){
    createPost('Hello');
  }


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Push</title>
    <!-- <link rel="stylesheet" href="./resources/css/main.css"> -->
    <link rel="stylesheet" href="./resources/css/push.css">
    <script src="https://kit.fontawesome.com/7d40304bdb.js"></script>
  </head>
  <body>

    <header>
      <div class="profile">
        <img src="./resources/images/img_avatar.png">
        <span>Hi, Jacob</span> 
        <span class="logout"><a href="?logout">Logout</a></span>
      </div>
    </header>

    <section class="body">
      <main class="post-form">
        <form action="push.php" method="post">
          <h1>POST</h1>
          <textarea name="content" id="" cols="30" rows="10"></textarea>
          <button type="submit">POST</button>
        </form>
      </main>
      <aside class="recent">
        <h1>Recent Posts</h1>
        <div class="box">
              <div class="head">
                <small class="date">12/12/2018</small>
              </div>
              <div class="content">
                Hello its me how is going, this is a test messsage.
                Hello its me how is going, this is a test messsage.
                Hello its me how is going, this is a test messsage.
                Hello its me how is going, this is a test messsage.
              </div>
              <div class="footer">
                <div class="clap active">
                 <i class="far fa-thumbs-up"></i>
               </div>
                <span class="clap-val">1000</span>
                 <div class="clap-dis active">
                   <i class="far fa-thumbs-down"></i>
                  </div>
                 <span class="clap-dis-val">50</span>
                 </div>
            </div>

      </aside>
    </section>

  </body>
</html>
