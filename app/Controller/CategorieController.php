<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\CategorieModel;

class CategorieController extends Controller {

    public function index(){
        $this->view('categories');
    }

    public function display_categorie(){
        $newCategorie = new CategorieModel();
        $categorie = $newCategorie->select_categories();
        if($categorie == true){
            $this->view('categories', $categorie);
        }else {
            $this->view('categories');
        }
    }

    public function insert_categorie(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'create_categorie'){
            $categorie_name = $_POST['categorie_name'];
            $categorie_name = ucfirst($categorie_name);

            $newCategorie = new CategorieModel();
            $newCategorie->set_categories_name($categorie_name);
            $result = $newCategorie->create_categories();
            if($result){
                $this->display_categorie();
            }else{
                $this->view('categories');
            }
            
        }
    }

    public function delete_categorie(){
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_id'])){
            $categorie_id = $_GET['delete_id'];

            $newCategorie = new CategorieModel();
            $newCategorie->set_categories_id($categorie_id);
            $result = $newCategorie->delete_categorie();
            if($result){
                $this->display_categorie();
            }else{
                $this->view('categories');
            }
        }
    }

    public function update_categorie(){

        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'update_categorie' && isset($_GET['update_id'])){

            $categorie_id = $_GET['update_id'];
            $categorie_name = $_POST['categorie_name'];

            $newCategorie = new CategorieModel();
            $newCategorie->set_categories_id($categorie_id);
            $newCategorie->set_categories_name($categorie_name);
            $result = $newCategorie->update_categorie();

            if($result){
                $this->display_categorie();
            }else{
                $this->view('categories');
            }
        }
            
    }


    public function searchCategorie(){
        if(isset($_POST['input'])){
            $searchTerm = $_POST['input'];
            $wiki = new CategorieModel();
            $searchResults = $wiki->searchByName($searchTerm);
            $this->view('searchCateResult', $searchResults);
        }
    }
}
