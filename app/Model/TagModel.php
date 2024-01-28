<?php

namespace App\Model;
use App\Core\Database;
use PDO;

class TagModel {
    private $tag_id;
    private $tag_name;
    private $conn;

    public function __construct()
    {
        $this->conn = new Database();
    }

    public function set_tag_name($tag_name){
        $this->tag_name = $tag_name;
    }

    public function get_tag_name(){
        return $this->tag_name;
    }

    public function set_tag_id($tag_id){
        $this->tag_id = $tag_id;
    }

    public function get_tag_id(){
        return $this->tag_id;
    }


    public function insert_tag(){
        $conn = $this->conn->connect();

        $query = "INSERT INTO tags (tag_name) 
        VALUES ('{$this->tag_name}')";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        if($stmt){
            return true;
        }else {
            return false;
        }
    }

    public function select_tag(){
        $conn = $this->conn->connect();

        $query = "SELECT * FROM tags";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function delete_tag(){
        $conn = $this->conn->connect();

        $query = "DELETE FROM tags WHERE id_tag = {$this->tag_id}";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        if($stmt){
            return true;
        }else {
            return false;
        }
    }

    public function update_tag(){
        $conn = $this->conn->connect();

        $query = "UPDATE tags SET tag_name = '{$this->tag_name}' WHERE id_tag = '{$this->tag_id}'";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        if($stmt){
            return true;
        }else {
            return false;
        }
    }


    public function tag_statistique(){
        $conn = $this->conn->connect();

        $query = "SELECT COUNT(id_tag) FROM tags";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = (int) $stmt->fetchColumn();

        return $result;
    }

    public function searchByName($input){
        $conn = $this->conn->connect();

        $query = "SELECT * FROM tags WHERE tag_name LIKE ? ";
        $stmt = $conn->prepare($query);
        $stmt->execute(["%$input%"]);

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
}