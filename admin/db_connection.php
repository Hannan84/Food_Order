<?php
session_start();
class Database{

    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'food_order';
    protected $conn;

//    Database connection
    public function __construct(){
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error){
            echo "Connection Failed".$this->conn->connect_error;
        }
    }
}

//$obj = new Database();