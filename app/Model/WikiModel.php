<?php

namespace App\Model;
use App\Core\Database;
use PDO;

class WikiModel {
    private $wiki_id;
    private $wiki_content;
    private $categorie_id;
    private $user_id;
    private $tag_id;
    private $wiki_status;
    private $wiki_title;
    private $date_create;
    private $conn;

    public function __construct()
    {
        $this->conn = new Database;
    }

    public function setWikiId($wiki_id) {
        $this->wiki_id = $wiki_id;
    }

    public function setWikiContent($wiki_content) {
        $this->wiki_content = $wiki_content;
    }

    public function setCategorieId($categorie_id) {
        $this->categorie_id = $categorie_id;
    }

    public function setTagId($tag_id) {
        $this->tag_id = $tag_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function setWikiStatus($wiki_status) {
        $this->wiki_status = $wiki_status;
    }

    public function setWikiTitle($wiki_title) {
        $this->wiki_title = $wiki_title;
    }

    public function setDateCreate($date_create) {
        $this->date_create = $date_create;
    }

    // Getters
    public function getWikiId() {
        return $this->wiki_id;
    }

    public function getWikiContent() {
        return $this->wiki_content;
    }

    public function getCategorieId() {
        return $this->categorie_id;
    }

    public function getTagId() {
        return $this->tag_id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getWikiStatus() {
        return $this->wiki_status;
    }

    public function getWikiTitle() {
        return $this->wiki_title;
    }

    public function getDateCreate() {
        return $this->date_create;
    }

    public function insert_wiki(){
        $conn = $this->conn->connect();

        $query = "INSERT INTO wikis (content, title, date_create) 
        VALUES ('{$this->wiki_content}', '{$this->wiki_title}', '{$this->date_create}')";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $last_id = $conn->lastInsertId();

        if($stmt){
            $query2 = "INSERT INTO wikis_tags (wiki_id, tag_id) 
            VALUES ('$last_id', '{$this->tag_id}')";
            $stmt2 = $conn->prepare($query2);
            $stmt2->execute();
            if($stmt2){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function select_wiki(){
        $conn = $this->conn->connect();

        $query = "SELECT * FROM wikis
        INNER JOIN categories ON categorie_id = id_categorie
        INNER JOIN users  ON user_id = id_user
        INNER JOIN wikis_tags  ON id_wiki = wiki_id 
        INNER JOIN tags  ON tag_id = id_tag";

        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return !empty($result) ? $result : false;
    }

    public function select_options_tage(){
        $conn = $this->conn->connect();

        $query = "SELECT * FROM tags";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        // var_dump($result);
        // die();
        return !empty($result) ? $result : false;
    }


    public function select_options_categories(){
        $conn = $this->conn->connect();

        $query = "SELECT * FROM categories";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        // var_dump($result);
        // die();
        return !empty($result) ? $result : false;
    }

    public function delete_wiki($id_WT){
        $conn = $this->conn->connect();

        $query = "DELETE FROM wikis_tags WHERE id_WT = '$id_WT'";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        if($stmt){
            $query2 = "DELETE FROM wikis WHERE id_wiki = '{$this->wiki_id}'";
            $stmt2 = $conn->prepare($query2);
            $stmt2->execute();
            if($stmt2){
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }

        

        
    }

}