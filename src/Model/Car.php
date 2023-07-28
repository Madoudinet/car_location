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

    /**
     * @param int $id
     * @param string $name
     * @param string $description
     * @param float $price
     * 
     * @return void
     */
    public function updateCar(int $id, string $name, string $description, float $price): void
    {
        $stmt = $this->pdo->prepare('UPDATE car SET name = :name, description = :description, price = :price WHERE id = :id;');
        $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':id' => $id
        ]);
    }
}

// Inserer en base de donne 2 ligne pour la table car

// Creer une class abstraite AbstractModel src/model

    // propriete protected $pdo
    
    // constructor
        // initialisera la propriete pdo avec la methode static getConnection       

    // Faire herite la classe Car