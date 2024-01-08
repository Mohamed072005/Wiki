<?php

session_start();

// define("ROOT_PATH", dirname(__DIR__));

// require_once(ROOT_PATH.'/app/Core/App.php');

// new App();

// function Show($things){
//     echo '<pre>';
//     var_dump($things);
//     echo '</pre>';
// }
include '../vendor/autoload.php';

require "../app/Core/App.php";

$obj = new App();
$obj->loadController();
?>