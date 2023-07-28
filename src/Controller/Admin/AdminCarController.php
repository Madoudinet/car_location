<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Core\Session;
use App\Model\Car;

class AdminCarController extends AbstractController
{
    public function index()
    {
        $car = new Car();
        $cars = $car->getCars();
        require_once '../templates/admin/cars.php';
    }

    public function carForm($params)
    {
        $car = new Car();
        $carDetails = $car->getCarById($params['id']);
        require_once '../templates/admin/car-form.php';
    }

    public function updateCar()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $id = trim($_POST['id']);
            $model = trim($_POST['name']);
            $description = trim($_POST['description']);
            $price = trim($_POST['price']);

            if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
                $allowed = ['jpg' => 'image/jpg', 'jpeg' => 'image/jpeg', 'gif' => 'image/gif'];
                $fileName = $_FILES['image']['name'];
                $fileType = $_FILES['image']['type'];
                $fileSize = $_FILES['image']['size'];

                $extension = pathinfo($fileName, PATHINFO_EXTENSION);

                if(!array_key_exists($extension, $allowed)){
                    Session::setFlashMessage('Le format de votre fichier n\'est pas correct ! (jpg, jpeg, gif)', 'warning');
                    header("Location: /car-location/backoffice/update-car/$id");
                    exit();
                }

                $maxSize = 5 * 1024 * 1024;
                if($fileSize > $maxSize){
                    Session::setFlashMessage('Votre fichier est trop volumineux !', 'warning');
                    header('Location: /car-location/backoffice/update-car/' . $id);
                    exit();
                }

                if(in_array($fileType, $allowed)){
                    if(file_exists('./img/'. $fileName)){
                        Session::setFlashMessage('Le fichier a déjà été téléchargé !', 'warning');
                    header('Location: /car-location/backoffice/update-car/' . $id);
                    exit();
                    } else {
                        move_uploaded_file($_FILES['image']['tmp_name'], './img/upload/' . $_FILES['image']['name']);
                        Session::setFlashMessage('L\'image de la voiture viens d\'être modifié !', 'success');
                        header('Location: /car-location/backoffice/cars');
                        exit();
                    }
                }

            } else {
                Session::setFlashMessage('Une erreur dans le fichier image s\'est produite, veuillez recommencer !', 'warning');
                header("Location: /car-location/backoffice/update-car/$id");
                exit();
            }

            if(empty($model)){
                Session::setFlashMessage('Le champs modele est vide !', 'warning');
                header("Location: /car-location/backoffice/update-car/$id");
                exit();
            }

            $car = new Car();
            $car->updateCar($id, $model, $description, $price);
            Session::setFlashMessage('Une voiture viens d\'être modifié !', 'success');
            header('Location: /car-location/backoffice/cars');
            exit();

        } else {
            header('Location: /car-location/backoffice/cars');
            exit();
        }
    }
}