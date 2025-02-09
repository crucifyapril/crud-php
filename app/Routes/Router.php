<?php

namespace app\Routes;

class Router {
    private array $routes = [];

    public function add(string $method, string $path, string $controller, string $action): void
    {
        $this->routes[] = compact('method', 'path', 'controller', 'action');
    }

    public function dispatch(string $method, string $uri): void
    {
        foreach ($this->routes as $route) {
            if ($method === $route['method'] && preg_match("#^" . $route['path'] . "$#", $uri, $matches)) {
                array_shift($matches);
                $controller = "app\\Controllers\\" . $route['controller'];
                $instance = new $controller();
                call_user_func_array([$instance, $route['action']], $matches);
                return;
            }
        }
        echo json_encode(['error' => 'Маршрут не найден']);
    }
}