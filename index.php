<?php 

include 'autoload.php';

use \Application\Model\Post;


$months = array("","JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pricipal Talks</title>

	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css" href="./resources/stylesheets/css/main.css">
	<!-- stylesheets end -->

	<meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>
<body>

	<aside class="mic">
		<img src="./resources/images/mic.png">
	</aside>

	<!-- Heading Section -->
	<header>
		<h1 class="main-heading">
			<!-- <div class="logo">LOGO</div> -->
			<div class="caption">Principal Talks</div>
		</h1>
	</header>
	<!-- Heading Section End -->

	<!-- Container -->
	<div class="container">

		<!-- Sub Heading -->
		<!-- <h2 class="sub-heading">
			<div class="pp">
				<img src="./resources/images/avatar.png">
			</div>
			<div class="name">Principal</div>
		</h2> -->
	
		<!-- Empty placeholder -->

		<h1 class="temp-placeholder">No messages yet</h1>

		<!-- Pinned Section-->

		<section class="pinned-section">

			
			<h3 class="heading">Pinned</h3>


			<?php foreach ((new Post())->getPinnedPosts() as $post):?>
			<div class="card">
				<span class="card-date">
					<?php $d = explode('-', $post['date']) ?>
					
					<div class="day"><?=$d['2']?></div>
					<div class="month"><?=$months[$d['1']]?>  <?=$d['0']?></div>
				</span>
				<span class="card-content">
					<?= $post['content']?>
				</span>
				<div class="card-like" id="<?=$post['id']?>">
					<span class="plus1">+1</span>
					<img src="./resources/images/clap.svg">
				</div>
			</div>
		<?php endforeach; ?>

			

		</section>

		<!-- Pinned Section End-->


		<!-- Recent Section -->

		<section class="recent-section">
			<h3 class="heading">Recent</h3>


			<div class="recent-cards">

				<?php foreach ((new Post())->getRecentPosts() as $post): ?>
				<div class="card">
					<span class="card-date">
						<?php $d = explode('-', $post['date']) ?>
						<div class="day"><?=$d['2']?></div>
						<div class="month"><?=$months[$d['1']]?>  <?=$d['0']?></div>
					</span>
					<div class="card-content">
						<?= $post['content'] ?>
					</div>
					<div class="card-like" id="<?=$post['id']?>">
						<span class="plus1">+1</span>
						<img src="./resources/images/clap.svg">
					</div>
				</div>
			<?php endforeach;?>
			</div>

		</section>
		<!-- Recent Section End -->


		<!-- Show More -->
		<!-- <small class="showmore">
			<a href="#">show more<a>
		</small> -->
	</div>
	<!-- Container End-->

	<!-- Scripts -->
	<script type="text/javascript" src="resources/js/jquery.min.js"></script>

	<script type="text/javascript" src="resources/js/main.js"></script>

</html>