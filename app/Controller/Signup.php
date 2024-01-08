<?php

use App\Core\Controller;

class Signup extends Controller {
    public function index(){
        $this->view('signup');
    }
}