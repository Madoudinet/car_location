<?php

namespace App\Controller;

use App\Core\Database;

abstract class AbstractController
{
    // Creer une propriété privé $pdo
    protected \PDO $pdo;

    // creer un constructeur vide
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }
}