<?php

namespace app\Services;

use app\Models\User;

class UserService {
    private User $user;

    public function __construct() {
        $this->user = new User();
    }

    public function register(string $name, string $email, string $password): array {
        if ($this->user->findByEmail($email)) {
            return ['error' => 'Email уже существует'];
        }
        $this->user->create($name, $email, $password);
        return ['success' => 'Пользователь создан'];
    }

    public function login(string $email, string $password): array {
        $user = $this->user->findByEmail($email);
        if (!$user || !password_verify($password, $user['password'])) {
            return ['error' => 'Неверный email или пароль'];
        }
        return ['success' => 'Авторизация успешна'];
    }

    public function getUser(int $id): array {
        $user = $this->user->findById($id);
        return $user ? ['success' => $user] : ['error' => 'Пользователь не найден'];
    }

    public function updateUser(int $id, string $name, string $email): array {
        if (!$this->user->findById($id)) {
            return ['error' => 'Пользователь не найден'];
        }
        $this->user->update($id, $name, $email);
        return ['success' => 'Данные пользователя обновлены'];
    }

    public function deleteUser(int $id): array {
        if (!$this->user->findById($id)) {
            return ['error' => 'Пользователь не найден'];
        }
        $this->user->delete($id);
        return ['success' => 'Пользователь удален'];
    }
}
