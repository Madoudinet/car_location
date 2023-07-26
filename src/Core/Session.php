<?php

namespace App\Core;

use App\Model\AbstractModel;

class Session extends AbstractModel
{
    public static function setFlashMessage($message)
    {
        $_SESSION['message'] = $message;
    }

    public static function getFlashMessage()
    {
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
        }else {
            unset($_SESSION['message']);

        }
    }
}