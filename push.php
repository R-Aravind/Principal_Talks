<?php

  require_once './Auth/user.php';
  auth('./login.php'); //authentication required

  require_once './Model/post.php';


  // create new post
  if(isset($_POST['content'])){
    createPost(htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'));
  }

  $posts = getAllPost(); // get last 10 posts

  if(isset($_REQUEST['delete'])){
    if(isset($_GET['id'])){
      deletePost($_GET['id'], './push.php');
    }
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
          <?= csrfToken();?>
          <textarea name="content" id="" cols="30" rows="10"></textarea>
          <button type="submit">POST</button>
        </form>
      </main>
      <aside class="recent">
        <h1>Recent Posts</h1>

        <?php foreach($posts as $post): ?>

        <div class="box">
              <div class="head">
                <small class="date"><?=$post['date']?></small>
              </div>
              <div class="content">
                <?=$post['content']?>
              </div>
              <div class="footer">
                <div class="clap active">
                 <i class="far fa-thumbs-up"></i>
               </div>
                <span class="clap-val"><?=$post['likes']?></span>
                 <div class="clap-dis active">
                   <i class="far fa-thumbs-down"></i>
                  </div>
                 <span class="clap-dis-val"><?=$post['dislikes']?></span>
                 </div>

                  <a href="?delete=1&id=<?=$post['id']?>">Delete</a>

            </div>
<?php endforeach;?>
      </aside>
    </section>

  </body>
</html>
