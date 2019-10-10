<?php

namespace Application\Model;

class Database{

	private $host = 'localhost';
	private $db_name = 'principal_talks';
	private $username = 'root';
	private $password = '';
	public $conn;

	function __construct(){

		// Create connection
		$this->conn = new \Mysqli($this->host, $this->username, $this->password, $this->db_name);

		// Check connection
		if ($this->conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

	}

	
}

