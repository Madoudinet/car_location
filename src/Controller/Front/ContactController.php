<?php

namespace App\Controller\Front;

// Creer la class ContactController

// function publique index

class ContactController
{
    public function index($params)
    {
        echo $params['id'];
    }

    public function saveForm()
    {
        
    }
}