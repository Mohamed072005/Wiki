<?php
namespace App\Controller;
use App\Core\Controller;

class _404Controller extends Controller {
    public function index(){
        // echo "<h1>Error, This page not found</h1>";
        $this->view('404');
    }

}
