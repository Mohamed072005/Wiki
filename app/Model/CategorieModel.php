<?php

namespace App\Model;

use App\Core\Database;
use PDO;

class CategorieModel {
    private $categorie_id;
    private $categorie_name;
    private $conn;

    public function __construct()
    {
        $this->conn = new Database;
    }

    public function set_categories_name($categorie_name){
        $this->categorie_name = $categorie_name;
    }
    public function get_categories_name(){
        return $this->categorie_name;
    }

    public function set_categories_id($categorie_id){
        $this->categorie_id = $categorie_id;
    }

    public function get_categories_id(){
        return $this->categorie_id;
    }

    public function create_categories(){
        $conn = $this->conn->connect();

        $query = "INSERT INTO categories (categorie_name) 
        VALUES ('{$this->categorie_name}')";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        if($stmt){
            return true;
        }else {
            return false;
        }
    }

    public function select_categories(){
        $conn = $this->conn->connect();

        $query = "SELECT * FROM categories";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function delete_categorie(){
        $conn = $this->conn->connect();
        $query = "DELETE FROM categories WHERE id_categorie = {$this->categorie_id}";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        if($stmt){
            return true;
        }else {
            return false;
        }
    }

    public function update_categorie(){

        $conn = $this->conn->connect();

        $query = "UPDATE categories SET categorie_name = '{$this->categorie_name}' WHERE id_categorie = {$this->categorie_id}";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        if($stmt){
            return true;
        }else {
            return false;
        }
    }


    public function categorie_statistique(){
        $conn = $this->conn->connect();

        $query = "SELECT COUNT(id_categorie) FROM categories";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = (int) $stmt->fetchColumn();

        return $result;
    }
}