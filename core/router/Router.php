<?php

namespace Core\Router;
class Router {
    private array $routes = [];

    /**
     * @param string $path
     * @param string $controller
     * @param string $method
     * @return void
     */
    public function addRoute(string $path, string $controller, string $method):void {
        $this->routes[$path] = ['controller' => $controller, 'method' => $method];
    }

    /**
     * @param $requestPath
     * @return void
     */
    public function dispatch($requestPath):void {
        if (isset($this->routes[$requestPath])) {
            $controllerName = $this->routes[$requestPath]['controller'];
            $methodName = $this->routes[$requestPath]['method'];

            $controller = new $controllerName();
            $controller->$methodName();
        } else {
            abort();
        }
    }
}
