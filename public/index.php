<?php
session_start();
require_once "../core/settings.php";
require_once ROOT_PATH . "/core/autoload.php";

use App\Controller\HomeController;
use App\Controller\StatusController;
use Core\Router\Router;

require_once "../core/helpers/helpers.php";
debug(false);

try {
    $router = new Router();
    $router->addRoute(path: '/', controller: HomeController::class, method: 'index');
    $router->addRoute(path: '/create-lead', controller: HomeController::class, method: 'store');
    $router->addRoute(path: '/statuses', controller: StatusController::class, method: 'index');
    $router->addRoute(path: '/api/statuses', controller: StatusController::class, method: 'store');

    $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $router->dispatch($requestPath);
} catch (Exception $e) {
    die();
}
