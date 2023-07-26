<?php

namespace App\Controller\Front;

use App\Model\AbstractModel;
use App\Model\User;

class UserController extends AbstractModel
{
    public function index()
    {
        require_once '../templates/front/form-inscription.php';
    }

    public function saveUser()
    {
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $pswd = $_POST['pswd'];
        $user = new User();
        $user->saveUser($pseudo, $email, $pswd);
    }
}