<?php

namespace App\Controller\Front;


// Creer la class HomeController

// function publique index

class HomeController
{
    public function index()
    {
        require_once '../templates/front/home.php';
    }
}