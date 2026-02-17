<?php
    namespace App\Core;

    use App\Controllers\PagesController;
    use App\Controllers\UsersController;
    use App\Controllers\AdminController;

    class Router { 

        private $routes = [ 
            'pages' => ['home', 'error'], 
            'users' => ['login', 'dashboard', 'logout'],
            'admin' => ['dashboard', 'users', 'addUser', 'delete', 'edit'], 
            ]; 

        public function callController($controller, $action) { 

            // apl le validate pour voir si les pages existes belles est bien

            list($controller, $action) = $this->validateRouter($controller, $action);

            // Switch pour instancier le bon contrôleur

            switch($controller) {
                case 'pages':
                    $controllerInstance = new  PagesController();
                    break;
                case 'users':
                    $controllerInstance = new UsersController();
                    break;
                case 'admin':
                    $controllerInstance = new AdminController();
                    break;
                default:

                // enleve les erreurs en attendant / -> / Plus tard, remplacer ce null par un contrôleur d’erreur ou un PagesController->error() pour afficher une page 404.

                $controllerInstance = null; 
            } 
                // Appelle l'action si le contrôleur a été instancié 

            if ($controllerInstance) { 
                $controllerInstance->{$action}(); 
            } 
        } 
        // Fonction qui vérifie et retourne le controller et action valides 

        private function validateRouter($controller, $action) {

            // Si la page n'existe pas dans le tableau associatif retourne error

            if (!array_key_exists($controller, $this->routes)) { 
                return ['pages', 'error'];
            }

            if (!in_array($action, $this->routes[$controller])) { 
                return ['pages', 'error'];
            }

            return [$controller, $action]; 
        } 
    } 
?>