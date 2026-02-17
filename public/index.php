<?php
    session_start();

    require_once __DIR__ . '/../vendor/autoload.php';

    use App\Core\Router;

    $router = new Router();
    $controller = $_GET['controller'] ?? 'users';
    $action = $_GET['action'] ?? 'login';

    $router->callController($controller, $action);