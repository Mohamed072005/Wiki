<?php

use App\Core\Controller;

class Signup extends Controller {
    public function index(){

        if(isset($_POST['singup'])){
            echo 'hello world';
            $this->view('home');
        }else {
            if(!isset($_POST['signup'])){
                $this->view('signup');
            }
        }

    }
}