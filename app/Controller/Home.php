
<?php


use App\Core\Controller;

class Home extends Controller {
    public function index(){

        // $obj = new User;
        // $arr['role_id'] = 1;
        // $result = $obj->select($arr);
        // Show($result);
        // $obj = new User;
        // $result = $obj->selectAll();
        // Show($result);


        // echo "Hello from Controller";
        $this->view('home');
    }

}
