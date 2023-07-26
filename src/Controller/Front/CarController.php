<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;

// Creer la class HomeController

// function publique index

class CarController extends AbstractController
{
    public function index($params)
    {
        require_once '../templates/front/car.php';
    }
}