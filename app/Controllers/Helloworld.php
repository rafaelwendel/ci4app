<?php namespace App\Controllers;

class Helloworld extends BaseController {
    
    public function index()
    {
        echo '<h1>Hello World!</h1>';
    }
    
    public function hellopersonalizado($nome)
    {
        echo "<h1>Hello, $nome </h1>";
    }
    
} 


