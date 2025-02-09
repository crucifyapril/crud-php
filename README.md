<p align="center">CRUD пользователей REST API с использованием PHP</p>

### Требования
- Docker
- Утилита Make

### Установка и запуск проекта
1. Клонировать репозиторий


2. Выполнить команду Make в склонированном проекте
```bash
make vendor build
```

3. Запустить контейнер
```bash
make up
```

для остановки контейнера используйте команду ```make down```

### **1. Регистрация пользователя**
**Метод:** `POST /register`

**Описание:** Создание пользователя.

**Тело запроса (JSON):**
```json
{
    "name": "Иван",
    "email": "ivan@example.com",
    "password": "myPassword"
}
```

**Ответ:** `"success": "Пользователь создан"`

**Ошибка:** `"error": "Email уже существует"`

### **2. Авторизация пользователя**

**Метод:** `POST /register`  

**Описание:** Авторизация по email и паролю.

**Тело запроса (JSON):**
```json
{
    "email": "ivan@example.com",
    "password": "mypassword"
}
```

**Ответ:** `"success": "Авторизация успешна"`

**Ошибка:** `"error": "Неверный email или пароль"`

### **3. Получение информации о пользователе**

**Метод:** `GET /users/{id}`

**Описание:** Получение информации пользователя по ID.

**Результат полученный от запроса (JSON):**
```json
{
    "success": {
        "id": 1,
        "name": "Иван",
        "email": "ivan@example.com"
    }
}
```

**Ошибка:** `"error": "Пользователь не найден"`

### **4. Обновление информации о пользователе**

**Метод:** `PUT /users/{id}`

**Описание:** Обновление информации пользователя по ID.

**Тело запроса (JSON):**
```json
{
    "name": "Иван",
    "email": "ivan@NewEmail.com",
    "password": "myNewPassword"
}
```

**Ответ:** `"success": "Данные пользователя обновлены"`

**Ошибка:** `"error": "Пользователь не найден"`

### **5. Удаление пользователя**

**Метод:** `DELETE /users/{id}`

**Описание:** Удаление пользователя по ID.

**Ответ:** `"success": "Пользователь удален"`

**Ошибка:** `"error": "Пользователь не найден"`