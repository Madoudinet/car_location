<?php

namespace App\Core;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function($class){
            // chercher la method php qui va me permettre de remplacer App par src
            $variable = str_replace('App', 'src', $class);
            $variable = str_replace('\\', DIRECTORY_SEPARATOR, $variable);
            var_dump($variable);
            require_once '..'. DIRECTORY_SEPARATOR . $variable.'.php';
        });
    }
}