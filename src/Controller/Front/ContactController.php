<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;

// Creer la class ContactController

// function publique index

class ContactController extends AbstractController
{
    public function index($params)
    {
        // echo $params['id'];
    }

    public function saveForm($param)
    {
        echo $param['id'];
    }
}