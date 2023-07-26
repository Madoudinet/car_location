<?php

namespace App\Model;

class Car
{
    public function getCars(\PDO $pdo)
    {
        $stmt = $pdo->prepare('SELECT * FROM car;');
        $stmt->execute();
        $cars = $stmt->fetchAll();

        return $cars;
    }
}

// Inserer en base de donne 2 ligne pour la table car