<?php

namespace App\Core;
use PDO;
use PDOException;

class Database {

    private $USER_NAME = "root";
    private $HOST_NAME = "localhost";
    private $DB_NAME = "wiki";
    private $PASSWORD = "";
    private $conn;

    public function connect(){
        try{
            $this->conn = new PDO("mysql:hostname={$this->HOST_NAME}; dbname={$this->DB_NAME}", $this->USER_NAME, $this->PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        }catch (PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function query($query, $data = []){
        $conn = $this->connect();
        $stmt = $conn->prepare($query);

        $check = $stmt->execute($data);
        if($check){
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)){
                return $result;
            }
        }else {
            return false;
        }
    }

    public function get_row($query, $data = []){
        $conn = $this->connect();
        $stmt = $conn->prepare($query);

        $check = $stmt->execute($data);
        if($check){
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)){
                return $result[0];
            }
        }else {
            return false;
        } 
    }
}


