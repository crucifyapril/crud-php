<?php

namespace app\Routes;

$router = new Router();

$router->add('POST', '/register', 'UserController', 'register');
$router->add('POST', '/login', 'UserController', 'login');
$router->add('GET', '/users/(\d+)', 'UserController', 'getUser');
$router->add('PUT', '/users/(\d+)', 'UserController', 'updateUser');
$router->add('DELETE', '/users/(\d+)', 'UserController', 'deleteUser');