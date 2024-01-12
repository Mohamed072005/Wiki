<?php

// class App {

//     private $controller = 'home';
//     private $method = 'index';

//     public function splite(){
//         $url = isset($_GET['url']) ? $_GET['url'] : 'home';
//         $url = explode("/", trim($url, "/"));
//         return $url;
//     }
    
//     public function loadController()
//     {
//         $url = $this->splite();
//         $fileName = '../app/Controller/' . ucfirst($url[0]) . '.php';
//         if(file_exists($fileName)){
//             require $fileName;
//             $this->controller = ucfirst($url[0]);
//         }else{
//             require '../app/Controller/_404.php';
//             $this->controller = "_404";
//         }

//         $controller = new $this->controller;
//         call_user_func_array([$controller, $this->method],$url);
//     }
// }
namespace App\Core;

use App\Controller\AuthoController;
use App\Controller\HomeController;
use App\controller\_404;
use App\Controller\_404Controller;

class App {
    private static $controller ;
    private static $method = "index";

    private static function splitURL() {
        $url = isset($_GET['url']) ? $_GET['url'] : 'dashboard';
        $url = trim($url, "/");
    
        return explode("/", $url);
    }
    
    public static function  loadController() {
        $url = self::splitURL();
        $controllerName = ucwords($url[0]) . 'Controller';
        $controllerClass = "App\\Controller\\" . $controllerName;

        if(!empty($url[1])){

                self::$method = $url[1];
                
        }

        if (class_exists($controllerClass)) {
            self::$controller = new $controllerClass();
            if(method_exists(self::$controller,self::$method)){
            
                $url = count($url) > 2 ? array_slice($url, 2) : [];

                call_user_func_array([self::$controller,self::$method],$url);
            
            } else {
        
                self::$controller = new _404Controller();
                call_user_func_array([self::$controller, 'index'],$url);
            }
        } else {
            self::$controller = new _404Controller();
            call_user_func_array([self::$controller, 'index'],$url);
        }
    }
}

