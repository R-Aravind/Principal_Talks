<?php

	include_once './Model/post.php';


	if(isset($_GET['id'])){
		if(!empty($_GET['id'])){
			likePost($_GET['id']);			
		}
	}

?>