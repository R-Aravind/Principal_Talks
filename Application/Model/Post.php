<?php
/*

Post Class : manipulate posts table
Parent Class : Database - get connection with database

Avaliable Methods:
	1)getAllPosts()
	2)getPost(int $id)
	3)getPinnedPosts()
	4)createPost(string $content, int $pinned=0)
	5)getRecentPosts()
	6)deletePost(int $id)
	7)likePost(int $id)
	8)unpinPost(int $id)
	9)updatePost(int $id, string $content, int $pinned)

*/


namespace Application\Model;

class Post extends Database{

	//get all posts from post table
	public function getAllPosts(){

		$sql = "SELECT * FROM `posts`";
		$result = $this->conn->query($sql);

		$posts = array();

		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$posts[] = $row;
			}
		}

		return $posts;
	}

	//get a specific post @param id of the post
	public function getPost(int $id){
		$sql = "SELECT * FROM `posts` WHERE `id`=$id";
		$result = $this->conn->query($sql);
		$posts = array();
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$posts[] = $row;
			}
		}
		return $posts;
	}

	// get all pinned posts
	public function getPinnedPosts(){
		$sql = "SELECT * FROM posts WHERE `pinned`=1 ORDER BY date DESC, id DESC";

		$result = $this->conn->query($sql);
		$posts = array();
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$posts[] = $row;
			}
		}
		return $posts;
	}

	// create a new post @param content of the post, @param bool pinned (True == 1 and False == 0)
	public function createPost(string $content, int $pinned=0){
		
		$content = $this->conn->real_escape_string($content);

		$sql = "INSERT INTO posts (`content`, `likes`, `date` , `pinned`) VALUES ('". $content ."', '0', NOW() , ".$pinned.")";
		
		$this->conn->query($sql);
	}

	// get last 10 recent posts
	public function getRecentPosts(){
		$sql = $sql = "SELECT * FROM `posts` ORDER BY date DESC, id DESC LIMIT 10";
		$result = $this->conn->query($sql);
		$posts = array();
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$posts[] = $row;
			}
		}
		return $posts;
	}

	// delete a post @param id
	public function deletePost(int $id){
		$id = $this->conn->real_escape_string($id);
		$sql = "DELETE FROM `posts` WHERE `id`=$id";

		$this->conn->query($sql);
	}

	// unpin a post @param id
	public function unpinPost(int $id){
		$id = $this->conn->real_escape_string($id);
		$sql = "UPDATE `posts` SET `pinned` = '0' WHERE `posts`.`id`=$id";

		$this->conn->query($sql);
	}

	// update a post @param id, content and pinned
	public function updatePost(int $id, string $content, int $pinned){
		$id = $this->conn->real_escape_string($id);
		$content = $this->conn->real_escape_string($content);
		$pinned = $this->conn->real_escape_string($pinned);

		$sql = "UPDATE `posts` SET `content` = '$content', `pinned` = $pinned WHERE `posts`.`id` = $id";

		$this->conn->query($sql);
	}

	//like a post @param id
	public function likePost(int $id){

		$id = $this->conn->real_escape_string($id);

		$sql = "UPDATE posts SET `likes` = `likes` + 1 WHERE `id` = $id";

		$this->conn->query($sql);
	}



}