<?php

namespace App\Model;

use App\Model\AbstractModel;

class Car extends AbstractModel
{
    public function getCars()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM car;');
        $stmt->execute();
        $cars = $stmt->fetchAll();

        return $cars;
    }

    public function getCarById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM car WHERE id = :id;');
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetch();
    }
}

// Inserer en base de donne 2 ligne pour la table car

// Creer une class abstraite AbstractModel src/model

    // propriete protected $pdo
    
    // constructor
        // initialisera la propriete pdo avec la methode static getConnection       

    // Faire herite la classe Car