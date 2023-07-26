<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use \App\Model\Car;

// Creer la class HomeController

// function publique index

class HomeController extends AbstractController
{
    public function index()
    {
        // Creer une class Car dans Model
        // Method public getCars()
        $car = new Car();
        $cars = $car->getCars($this->pdo);

        require_once '../templates/front/home.php';
    }
}

