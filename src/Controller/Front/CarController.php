<?php

namespace App\Controller\Front;


// Creer la class HomeController

// function publique index

class CarController
{
    public function index($params)
    {
        require_once '../templates/front/car.php';
    }
}