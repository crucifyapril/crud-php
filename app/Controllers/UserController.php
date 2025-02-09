<?php

namespace app\Controllers;

use app\Services\UserService;

class UserController
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
        header('Content-Type: application/json');
    }

    public function register(): void
    {
        $data = json_decode(file_get_contents("php://input"), true);
        echo json_encode($this->userService->register($data['name'], $data['email'], $data['password']));
    }

    public function login(): void
    {
        $data = json_decode(file_get_contents("php://input"), true);
        echo json_encode($this->userService->login($data['email'], $data['password']));
    }

    public function getUser($id): void
    {
        echo json_encode($this->userService->getUser((int)$id));
    }

    public function updateUser($id): void
    {
        $data = json_decode(file_get_contents("php://input"), true);
        echo json_encode($this->userService->updateUser((int)$id, $data['name'], $data['email']));
    }

    public function deleteUser($id): void
    {
        echo json_encode($this->userService->deleteUser((int)$id));
    }
}
