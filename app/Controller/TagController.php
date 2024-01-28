<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\TagModel;

class TagController extends Controller {
    

    public function display_tag(){
        $newTag = new TagModel();
        $result = $newTag->select_tag();
        if($result){
            $this->view('tags', $result);
        }else {
            $this->view('404');
        }
    }

    public function insert_tag(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'insert_tag'){
            $tag_name = $_POST['tag_name'];
            $tag_name = '#' . $tag_name;

            $newTag = new TagModel();
            $newTag->set_tag_name($tag_name);
            $result = $newTag->insert_tag();
            if($result){
                $this->display_tag();
            }else {
                $this->view('404');
            }
        }
    }

    public function delete_tag(){
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_id'])){
            $tag_id = $_GET['delete_id'];

            $newTag = new TagModel(); 
            $newTag->set_tag_id($tag_id);
            $result = $newTag->delete_tag();
            if($result){
                $this->display_tag();
            }else {
                $this->view('404');
            }
        }
    }

    public function update_tag(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'update_tag' && isset($_GET['update_id'])){
            $tag_id = $_GET['update_id'];
            $tag_name = $_POST['tag_name'];
            
            $newTag = new TagModel();
            $newTag->set_tag_id($tag_id);
            $newTag->set_tag_name($tag_name);
            $result = $newTag->update_tag();

            if($result){
                $this->display_tag();
            }else {
                $this->view('404');
            }
        }
    }

    public function searchTag(){
        if(isset($_POST['input'])){
            $searchTerm = $_POST['input'];
            $newTag = new TagModel();
            $searchResults = $newTag->searchByName($searchTerm);
            $this->view('searchTagResult', $searchResults);
        }
    }
}