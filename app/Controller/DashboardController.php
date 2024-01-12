<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\WikiModel;
use App\Model\TagModel;
use App\Model\CategorieModel;


class DashboardController extends Controller {
    public function index(){
        $this->view('dashboard');
    }

    public function to_wikis(){
        $this->view('wikis');
    }
    public function to_tags(){
        $this->view('tags');
    }

    public function display_statistique(){
        $newWiki = new WikiModel();
        $wikiResult = $newWiki->wiki_statistique();
        if($wikiResult){
            $newtag = new TagModel();
            $tagResult = $newtag->tag_statistique();
            if($tagResult){
                $newcategorie = new CategorieModel();
                $cateResult = $newcategorie->categorie_statistique();
                if($cateResult){
                    $this->view('dashboard', $wikiResult, $tagResult, $cateResult);
                }else{
                    $this->view('404');
                }
            }else{
                $this->view('404');
            }
        }else{
            $this->view('404');
        }
        
        
    }
    
}
