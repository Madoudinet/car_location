<?php

namespace App\Core;

use App\Controller\Admin\AdminCarController;
use App\Controller\Admin\AdminController;
use App\Controller\Front\HomeController;
use App\Controller\Front\ContactController;
use App\Controller\Front\CarController;
use App\Controller\Front\ReservationController;
use App\Controller\Front\UserController;

// require_once '../src/Controller/Front/ContactController.php';
// require_once '../src/Controller/Front/HomeController.php';
// require_once '../src/Controller/Front/CarController.php';

class Router
{
    private array $routes; // Tableau associatif pour stocker les routes et les fonction associés
    private $currentController; // Stock le controleur actuel pour l'action demandé

    public function __construct()
    {
        // Ajoute des routes dans le constructeur, donc à l'initialisation de l'objet
        $this->add_route('/', function () {
            $this->currentController = new HomeController(); // Créé une instance du controlleur d'accueil
            $this->currentController->index(); // Appelle la methode index du controleur d'accueil
        });
        // Route pour la page contact avec un parametre id
        // $this->add_route('/contact', function ($params) {// On peut passer les eventuels parametres à la fonction
        //     $this->currentController = new ContactController();
        //     $this->currentController->index($params);
        // });
        $this->add_route('/contact', function () {
            $this->currentController = new ContactController();
            $this->currentController->saveForm();
        });

        // Ajouter une route /car/{id}, function creera un objet de type CarController et il appellera la method index() {require_once template->front->car.php h1 Bienvenue dans la page des voitures}

        $this->add_route('/car', function ($params) {
            $this->currentController = new CarController();
            $this->currentController->index($params);
        });

        $this->add_route('/reservation/{id}', function($params){
            $this->currentController = new ReservationController();
            $this->currentController->index($params);
        });
            
        $this->add_route('/inscription', function(){
            $this->currentController = new UserController();
            $this->currentController->index();
        });
            
        $this->add_route('/save-user', function(){
            $this->currentController = new UserController();
            $this->currentController->saveUser();
        });

        $this->add_route('/connexion', function(){
            $this->currentController = new UserController();
            $this->currentController->connexion();
        });
        $this->add_route('/deconnexion', function(){
            $this->currentController = new UserController();
            $this->currentController->deconnexion();
        });
        
        $this->add_route('/connect', function(){
            $this->currentController = new UserController();
            $this->currentController->connect();
        });

        $this->add_route('/backoffice', function(){
            $this->currentController = new AdminController();
            $this->currentController->index();
        });

        $this->add_route('/backoffice/cars', function(){
            $this->currentController = new AdminCarController();
            $this->currentController->index();
        });

        $this->add_route('/backoffice/update-car/{id}', function($param){
            $this->currentController = new AdminCarController();
            $this->currentController->carForm($param);
        });
        // /backoffice/form-car
        // carFormTraitement()
            // Verifier si le champs 'name' n'est pas vide

        $this->add_route('/backoffice/form-car', function(){
            $this->currentController = new AdminCarController();
            $this->currentController->updateCar();
        });

        
        
    }

    private function add_route(string $route, callable $closure)
    {
        // Convertit la route en une expression régulière pour une correspondance flexible en url et parametre
        // ! regex = expression regulière !
        $pattern = str_replace('/', '\/', $route); // Echappe les barres obliques pour la regex
        $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^\/]+)',  $pattern); // Remplace les parties entre accolade par des groupe de capture (parametre)
        $pattern = '/^' . $pattern . '$/'; // Ajoute les délimiteurs de début et de fin de la regex
        $this->routes[$pattern] = $closure; // Stock la regex de la route et la fonction associée dans le tableau des routes
    }

    public  function execute()
    {
        $requestUri = $_SERVER['REQUEST_URI']; // Récupere l'URL de la requete
        $finalPath = str_replace('/car-location', '', $requestUri); // Supprime le dossier racine pour obtenir le chemin final
        
        foreach ($this->routes as $key => $closure) {
            if (preg_match($key, $finalPath, $matches)) {
                array_shift($matches);
                $closure($matches); // Appelle la fonction associée à la route avec les eventuels parametres capturés
                return;
            }
        }
        require_once '../templates/error-404.php';
    }
}

//  Creer une classe Autoloader
    // namespace

    // fonction public static register()