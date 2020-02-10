<?php

include 'autoload.php';

use \Application\Controller\LoginController;
use \Application\Model\Post;

$AdminModel = new LoginController();
$PostModel = new Post();

if(isset($_REQUEST['logout'])){
  $AdminModel->logout();
}

// if not login redirect -> login.php
if(!($AdminModel->isLogin())){
  header('Location: login.php');
  die();
}

// edit post content
if(isset($_POST['content']) && isset($_GET['id'])){
  $id = $_GET['id'];
  $pinned = 0;
  if(isset($_POST['pinned'])){
    $pinned = 1;
  }
  $content = $_POST['content'];
  $content = htmlentities($content);
  if(!empty($content)){
    $PostModel->updatePost($id, $content, $pinned);
    header('Location: push.php');
  }
}

// if not id redirect -> push
if(isset($_GET['id']) && !empty($_GET['id'])){
  $id = $_GET['id'];
  $post = $PostModel->getPost($id)[0];
}else{
  header('Location: push.php');
}



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Push</title>
  <!-- <link rel="stylesheet" href="./resources/css/main.css"> -->
  <link rel="stylesheet" href="./resources/stylesheets/css/push.css">
  <script src="https://kit.fontawesome.com/7d40304bdb.js"></script>
</head>

<body>

  <header>
    <div class="profile">
      <img src="./resources/images/avatar.png">
      <span>
        <p>Hi, <b>Principal</b> </p>
      </span>
      <span class="logout"><a href="?logout">Logout</a></span>
    </div>
  </header>

  <section class="body">
    <main class="post-form">
      <form action="edit.php?id=<?php echo $post['id']?>" method="post">
        <h1>POST</h1>
        <textarea name="content" id="" cols="30" rows="10"><?php echo $post['content']; ?></textarea>
        <button type="submit">POST</button>
        <label>Pin: </label><input class="pinned" type="checkbox" name="pinned" <?php echo $post['pinned'] ? 'checked': '' ?>>
      </form>
    </main>

    <aside class="recent">
      <h1>Recent Posts</h1>

      <?php foreach($PostModel->getRecentPosts() as $post): ?>

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
            <span class="clap-val"><?=$post['likes']?></span>
          </div>

          
        </div>

      </div>
      <?php endforeach;?>
    </aside>
  </section>

</body>

</html>