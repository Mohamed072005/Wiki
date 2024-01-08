<?php

use App\Core\Controller;

class Login extends Controller {
    public function index(){

        // $obj = new User;
        // $arr['first_name'] = 'Amine';
        // $arr['last_name'] = 'Haouat';
        // $arr['email'] = 'qwertyu@gmail.com';
        // $arr['passwordd'] = '1234567890';
        // $arr['role_id'] = 1;
        // $obj->insert($arr);
        // echo $_GET['name'];

        // echo "Login  from Controller";
        $this->view('login');
    }

}