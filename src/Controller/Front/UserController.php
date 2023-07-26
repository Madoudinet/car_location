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
        // Verifie si le formulaire a été soumis
        if($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            // Recuperer les données du formulaire
            $pseudo = trim($_POST['pseudo']); // Nettoyer les espaces en début et en fin de la chaine de caractere
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL); 
            $pswd = password_hash(trim($_POST['pswd']), PASSWORD_DEFAULT); // Crypter le mot de passe

            if(empty($pseudo)){
                $_SESSION['message'] = 'Le champs pseudo est vide !'; // Création d'un message d'erreur sauvegardé en Session
                header('Location:/car-location/inscription');// Redirection vers le formulaire
                exit();
            }
            // Creer une class Session dans Core car c'est une classe utilitaire
            // method static setFlashMessage($message)
            // $_SESSION['message'] = $message;

            //  method static getFlashMessage()
                // Si $_SESSION['message'] existe
                    // on l'affiche
                // on détruit la variable
            $user = new User();
            $user->saveUser($pseudo, $email, $pswd);
        }
    }
}