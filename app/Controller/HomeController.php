<?php

namespace App\Controller;

use App\Core\Controller;

class HomeController extends Controller {
    public function index(){
        $this->view('home');
    }

    public function to_wikis(){
        $this->view('wikis');
    }
    public function to_tags(){
        $this->view('tags');
    }
    
}
