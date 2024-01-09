<?php

namespace App\Model;
use App\Core\Database;
use PDO;

class UserModel {

    private $user_id;
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $role_id;
    private $conn;

    public function __construct() {
        $this->conn = new Database();
    }

    public function setFirstname($firstname){
        $this->first_name=$firstname;
    }
    public function getFirstname(){
        return $this->first_name;
    }
    public function setLastname($lastname){
        $this->last_name=$lastname;
    }
    public function getLastname(){
        return $this->last_name;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setPassword($password){
        $this->password=$password;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setRoleId($role_id){
        $this->role_id=$role_id;
    }
    public function getetRoleId(){
        return $this->role_id;
    }

    // public function register(){
    //     $conn = $this->conn->connect();
    //     $query = "INSERT INTO users (first_name, last_name, email, passwordd, role_id) 
    //     VALUES ('{$this->first_name}', '{$this->last_name}, '{$this->email}, '{$this->password}', '{$this->role_id}')";
    //     $stmt = $conn->prepare($query);
    //     $stmt->execute();
    // }
    public function register(){
        $error = "";
        $conn = $this->conn->connect();
        $query = "SELECT email FROM users WHERE email = '{$this->email}'";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        if($stmt->rowCount($result) > 0){
            $error = '<h5 class = "text-danger">This email already used</h5>';
            $_SESSION['error_signup'] = $error;
            return false;
        }else {
            $queryInsert = "INSERT INTO users (first_name, last_name, email, passwordd, role_id) 
            VALUES ('{$this->first_name}', '{$this->last_name}', '{$this->email}', '{$this->password}', '{$this->role_id}')";
            $stmtInsert = $conn->prepare($queryInsert);
            $stmtInsert->execute();
            return true;
        }
        
    }

    public function login($email, $password){
        $conn = $this->conn->connect();
        $query = "SELECT * FROM users WHERE email = :email AND passwordd = :passwordd";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':passwordd', $password);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        if($stmt->rowCount($result) > 0){
            $_SESSION['user_id'] = $result->id;
            $_SESSION['first_name'] = $result->first_name;
            $_SESSION['last_name'] = $result->last_name;
            $_SESSION['role_id'] = $result->role_id;
            return true;
        }else {
            return false;
        }

    }

}