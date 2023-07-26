<?php

// Démarrer la session en premier
session_start();

use App\Core\Autoloader;
use App\Core\Database;
use App\Core\Router;

// require_once '../src/Core/Router.php';
require_once '../src/Core/Autoloader.php';

Autoloader::register();

Database::connect();
$router = new Router();
$router->execute();