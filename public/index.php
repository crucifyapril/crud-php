<?php

use app\Routes\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$router = new Router();

require '../app/Routes/api.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->dispatch($method, $uri);
