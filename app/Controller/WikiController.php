<?php

namespace App\Controller;
use App\Core\Controller;
use App\Model\WikiModel;
use WeakMap;

class WikiController extends Controller {
    public function index(){
        $this->view('wikis');
    }


    public function wiki_details(){
        $this->view('wiki_details');
    }


    public function insert_wiki(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'insert_wiki'){
            $title = $_POST['title'];
            $content = $_POST['content'];
            $categorie_id = $_POST['categorie'];
            $tag_id = $_POST['tag'];
            $user_id = $_SESSION['user_id'];
            $date_create = date('y-m-d h:i:s');

            $newWiki = new WikiModel();
            $newWiki->setWikiContent($content);
            $newWiki->setWikiTitle($title);
            $newWiki->setCategorieId($categorie_id);
            $newWiki->setTagId($tag_id);
            $newWiki->setDateCreate($date_create);
            $newWiki->setUserId($user_id);
            $result = $newWiki->insert_wiki();

            if($result){
                $this->display_wiki();
            }else {
                $this->view('404');
            }
        }
    }


    public function select_options_categories(){
        $newWiki = new WikiModel();
        $result = $newWiki->select_options_categories();
        if($result){
            return $result;
        }else {
            return 'No result';
        }
    }

    public function select_options_tags(){
        $newWiki = new WikiModel();
        $result = $newWiki->select_options_tage();
        if($result){
            return $result;
        }else {
            return 'No result';
        }
    }

    public function display_wiki(){
        $newWiki = new WikiModel();
        $result = $newWiki->select_wiki();
        $result2 = $this->select_options_tags();
        $result3 = $this->select_options_categories();
        $this->view('wikis', $result, $result2, $result3);
    }

    public function delete_wiki(){
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_id'])){
            $id_wiki = $_GET['delete_id'];

            $newWiki = new WikiModel();
            $newWiki->setWikiId($id_wiki);
            $result = $newWiki->delete_wiki();
            
            if($result){
                $this->display_wiki();
            }else {
                $this->view('404');
            }

        }
    }
}