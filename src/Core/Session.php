<?php

namespace App\Core;

use App\Model\User;

class Session
{
    public static function setFlashMessage(string $message)
    {
        $_SESSION['message'] = $message;
    }

    public static function getFlashMessage()
    {
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }

    public static function createSession(array $user)
    {
        $_SESSION['LOGGED_USERNAME'] = $user['username'];
        $_SESSION['LOGGED_ID'] = $user['id'];
        if($user['admin'] === true){
            $_SESSION['LOGGED_ADMIN'] = true;
        }
    }

}