-- Создание основной базы данных
CREATE DATABASE IF NOT EXISTS laravel
    DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Настройка пользователя и прав доступа
GRANT ALL ON laravel.* TO 'user'@'%' IDENTIFIED BY 'password';

FLUSH PRIVILEGES;
