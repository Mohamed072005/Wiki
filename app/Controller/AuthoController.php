<?php

namespace App\Controller;
use App\Core\Controller;
use App\Model\UserModel;

class AuthoController extends Controller {
    public function index(){
        $this->view('login');
    }

    public function to_login(){
        $this->view('login');
    }

    public function to_signup() {
        
        $this->view('signup');
    }

    public function signup(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'regester'){
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $newUser = new UserModel();
            $newUser->setFirstname($first_name);
            $newUser->setLastname($last_name);
            $newUser->setEmail($email);
            $newUser->setPassword($password);
            $newUser->setRoleId(2);
            $result = $newUser->register();
            if($result){
                $this->view('login');
            }else {
                $this->view('signup');
            }
            
        }
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'login'){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $newUser = new UserModel();
            $result = $newUser->login($email, $password);

            if($result){
                $this->view('hello');
            }else {
                $this->view('login');
            }
    }
}

    public function logout(){
        session_destroy();
        $this->view('login');
    }

}