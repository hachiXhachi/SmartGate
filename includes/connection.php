<?php

class Database {
	private $host = "mysql:host=localhost; dbname=smartgatedb";
	private $user = "root";
	private $password = "";
	protected $con;

	public function open(){
		try{
			$this->con = new PDO($this->host, $this->user, $this->password);
			return $this->con;
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function close(){
   		$this->con = null;
 	}
}

$pdo = new Database();

?>