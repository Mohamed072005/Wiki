<?php

class App {

    private $controller = 'home';
    private $method = 'index';

    public function splite(){
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        $url = explode("/", trim($url, "/"));
        return $url;
    }
    
    public function loadController()
    {
        $url = $this->splite();
        $fileName = '../app/Controller/' . ucfirst($url[0]) . '.php';
        if(file_exists($fileName)){
            require $fileName;
            $this->controller = ucfirst($url[0]);
        }else{
            require '../app/Controller/_404.php';
            $this->controller = "_404";
        }

        $controller = new $this->controller;
        call_user_func_array([$controller, $this->method],$url);
    }
}

