<?php

class Database {
	private $host = "mysql:host=mysql5049.site4now.net; dbname=db_aa1176_gatedb";
	private $user = "aa1176_gatedb";
	private $password = "qazplm123";
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