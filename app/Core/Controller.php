<?php

namespace App\Core;

class Controller {

    public function view($name, $data = [], $data_tag = [], $data_cate = []){

        // if(!empty($data)){
        //     extract($data);
        // }        
        $fileName = '../app/View/' . $name . '.view.php';
        if(file_exists($fileName)){
            require $fileName;
        }else{
            require '../app/View/404.view.php';
        }
    }
}