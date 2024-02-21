<?php

// class Database {
//     private $host = "localhost"; 
//     private $db_name = "smartgatedb"; 
//     private $username = "root";
//     private $password = ""; // Change to your MySQL password if you have set any
//     protected $con;

//     public function open(){
//         try{
//             $this->con = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
//             $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             return $this->con;
//         }catch(PDOException $e){
//             echo "Connection failed: " . $e->getMessage();
//         }
//     }

//     public function close(){
//         $this->con = null;
//     }
// }

// $pdo = new Database();


// <!-- for localhost connection -->

class Database {
    private $host = "localhost"; 
    private $db_name = "smartgatedb"; 
    private $username = "root";
    private $password = ""; // Change to your MySQL password if you have set any
    protected $con;

    public function open(){
        try{
            $this->con = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->con;
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function close(){
        $this->con = null;
    }
}

$pdo = new Database();
?>




