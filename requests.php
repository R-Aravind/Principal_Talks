<?php

include 'autoload.php';
use \Application\Model\Post;
use \Application\Model\Admin;

if(isset($_GET['liked']) && !empty($_GET['liked'])){
	$id = $_GET['liked'];
	(new Post())->likePost($id);
	echo 'success';
}


// DEVELOPMENT PURPOSE ONLY !!


if(isset($_GET['createadmin'])){
	(new Admin)->addAdmin('jack','sparrow',$_GET['password'],$_GET['email']);
}



////////





?>