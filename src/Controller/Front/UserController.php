<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Core\Session;
use App\Model\User;

class UserController extends AbstractController
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
            $pswd = trim($_POST['pswd']); // Crypter le mot de passe

            // die();
            if(empty($pseudo)){
               // $_SESSION['message'] = 'Le champs pseudo est vide !';  Création d'un message d'erreur sauvegardé en Session
                Session::setFlashMessage('Le champs de pseudo est vide !', 'warning');
                header('Location:/car-location/inscription');// Redirection vers le formulaire
                exit();
            }
            if(empty($email)){
                Session::setFlashMessage('Le champs email est vide !', 'warning');
                header('Location:/car-location/inscription');
                exit();
            }
            if(empty($pswd)){
                Session::setFlashMessage('Le champs mot de passe est vide !', 'warning');
                header('Location:/car-location/inscription');
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
            if($user->getUserByEmail($email)){
                Session::setFlashMessage('Cet email est déjà utilisé !', 'warning');
                header('Location:/car-location/inscription');
                exit();
            };

            $pswd = password_hash($pswd, PASSWORD_DEFAULT);
            $user->saveUser($pseudo, $email, $pswd);
            Session::setFlashMessage("Félicitation $pseudo, vous êtes inscrit !", 'warning');
            header('Location:/car-location');
            exit();
        }
    }

    public function connexion()
    {
        require_once '../templates/front/connexion.php';
    }

    public function connect()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
           
            $email = trim($_POST['email']); 
            $pswd = trim($_POST['pswd']); 

            if(empty($email)){
                Session::setFlashMessage('Votre champs email est vide', 'warning');
                header('Location:/car-location/connexion');
                exit();
            }
            
            if(empty($pswd)){
                Session::setFlashMessage('Votre champs mot de passe est vide', 'warning');
                header('Location:/car-location/connexion');
                exit();
            }

            $user = new User();
            $user = $user->getUserByEmail($email);

            if($user === false){
                Session::setFlashMessage('Votre email n\'existe pas !', 'warning');
                header('Location:/car-location/connexion');
                exit();
            }

            if(password_verify($pswd, $user['mdp'])){
                Session::createSession($user);
                Session::setFlashMessage("Vous êtes connecté ".$user['username'], 'warning');
                header('Location:/car-location/');
                exit();

            } else {
                Session::setFlashMessage('Votre mot de passe est erroné !', 'danger');
                header('Location:/car-location/connexion');
                exit();
            }


            // var_dump($user);
        }
    }
}