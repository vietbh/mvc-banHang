<?php
session_start();
// require_once 'config.php';

class Database {
    protected $conn = null;
    
    function __construct() {
        try {
            $str = "mysql:host=".DB_HOST."; dbname=".DB_NAME."; charset=utf8"; 
            $this->conn = new PDO($str,DB_USER,DB_PASS);
        } catch (PDOException $e) {
            die('Khong the ket noi: '. $e->getMessage());
        }
    }
     function getAll($sql){
        try {
            $result = $this->conn->query($sql);
            return $result->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
     function getOne($sql){
        try {
            $result = $this->conn->query($sql);
            return $result->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    
}
