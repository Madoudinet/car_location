<?php

namespace App\Controller\Front;

use \App\Model\Car;

// Creer la class HomeController

// function publique index

class HomeController
{
    public function index()
    {
        // Creer une class Car dans Model
        // Method public getCars()
        $cars = new Car();
        $cars->getCars();
        require_once '../templates/front/home.php';
    }
}

