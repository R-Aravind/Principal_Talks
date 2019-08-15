<?php require_once 'Model/post.php'; ?>

<?php

  $highlights = getHighLights();
  $history = getHistory();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Principal Talks</title>
    <link rel="stylesheet" href="resources/css/main.css">
    <script src="https://kit.fontawesome.com/7d40304bdb.js"></script>
  </head>
  <body>

    <!-- Header -->
    <header>
      <div class="content-layer">
        <div class="subtitle">
          College Of Engineering Chengannur
        </div>
        <div class="title">
          Principal <br> Talks
        </div>
      </div>

      <div class="mic-image">
        <img src="./resources/images/mic.png" alt="mic-image">
      </div>
      <div class="avatar">
        <img src="./resources/images/img_avatar.png" alt="avatar">
      </div>
      <div class="design">
        <div class="design-right">
        </div>
      </div>
      <div class="design">
        <div class="design-left">
        </div>
      </div>
    </header>
    <!-- End Header -->

    <!-- Notification Body -->
    <section class="noti-body">
      <div class="left-side">
        <h2 class="noti-head">Highlights</h2>
        <div class="notifications">

        <!-- Box -->
          <?php foreach($highlights as $post): ?>
          <div class="box">
            <div class="head">
              <small class="date"><?=$post['date']?></small>
            </div>
            <div class="content">
              <?=$post['content']?>  
            </div>
            <div class="clap">
              <i class="far fa-thumbs-up"></i>
            </div>
            <div class="clap-dis">
              <i class="far fa-thumbs-down"></i>
            </div>
          </div>
        <?php endforeach; ?>
        <!-- Box End -->
          
        </div>
      </div>
      <div class="right-side">
        <h2>History</h2>

        <div class="notifications">
        <?php foreach($history as $post): ?>
          <div class="box">
            <div class="head">
              <small class="date"><?=$post['date']?></small>
            </div>
            <div class="content">
              <?=$post['content']?>
            </div>
            <div class="clap">
              <i class="far fa-thumbs-up"></i>
            </div>
            <div class="clap-dis">
              <i class="far fa-thumbs-down"></i>
            </div>    
          </div>
        <?php endforeach;?>

          
        </div>

        </div>
        </div>

    </section>
    <!-- Notification Body End -->

    <script src="./resources/js/jquery.min.js"></script>
    <script src="./resources/js/main.js"></script>

  </body>
</html>
