<?php
/*

Admin Class : manipulate admins table
Parent Class : Database - get connection with database

Avaliable Methods:
	1)addAdmin(string $first_name,string $last_name,string $password, string $email)
	2)removeAdmin(int $id)
	3)getAdmin(string $id)
	4)authenticate(string $email, string $password)

*/




namespace Application\Model;

class Admin extends Database{ 

	// add an admin user
	public function addAdmin(string $email, string $password){

		$password = $this->conn->real_escape_string($password);
		$email = $this->conn->real_escape_string($email);

		$password = password_hash($password, PASSWORD_BCRYPT);

		$sql = "INSERT INTO `admins` (`id`, `password`, `email`) VALUES (NULL, '$password', '$email')";

		if($this->conn->query($sql) == TRUE){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//remove Admin user
	public function removeAdmin(int $id){
		$sql = "DELETE FROM `admins` WHERE `id`='$id'";
		
		if($this->conn->query($sql) == TRUE){
			return TRUE;
		}else{
			return FALSE;
		}

	}

	//get Admin usr
	public function getAdmin(string $id){
		$sql = "SELECT * FROM `admins` WHERE `id`='$id'";

		if($result = $this->conn->query($sql)){
			if($result->num_rows > 0){
				return $result->fetch_assoc();
			}else{
				return FALSE;
			}
		}
		else{
			return FALSE;
		}

	}

	//validate user
	public function authenticate(string $email, string $password){

		$email = $this->conn->real_escape_string($email);
		$password = $this->conn->real_escape_string($password);

		$sql = "SELECT `id`, `password` FROM `admins` WHERE `email`='$email'";


		if($result = $this->conn->query($sql)){
			if($result->num_rows > 0){
				$admin = $result->fetch_assoc();
				if(password_verify($password, $admin['password'])){
					$_SESSION['user_id'] = $admin['id'];
					return TRUE;
				}else{
					return FALSE;
				}
			}else{
				return FALSE;
			}
		}
		else{
			return FALSE;
		}

	}


}