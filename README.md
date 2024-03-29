# Laravel Dockerized Project

## Описание
Этот проект представляет собой Dockerized версию приложения Laravel. Он включает в себя настройки для Nginx, PHP-FPM и MySQL, обеспечивая легкую и удобную развертку приложения в контейнеризированной среде.

## Установка и Запуск

### Требования
- Docker и Docker Compose должны быть установлены на вашей машине.

### Запуск проекта
1. Клонируйте репозиторий на ваш локальный компьютер:
git clone https://github.com/Almadius/notesApi.git

2. Перейдите в каталог проекта:
cd <название_каталога_проекта>

3. Запустите контейнеры:
docker-compose up -d

### Использование Makefile
В проекте также имеется `Makefile` для удобства работы с Docker-командами.

- Запуск контейнеров:
make up
- Остановка контейнеров:
make down
- Просмотр логов:
make logs
- Выполнение команд внутри контейнера приложения:
make exec-app
- Выполнение команд внутри контейнера базы данных:
make exec-db
- Запуск тестов должен происходить внутри контейнера laravel-app:
php artisan test


## Конфигурация

### Docker-compose
Файл `docker-compose.yml` включает в себя настройки для трех сервисов:
- `app` - контейнер для приложения Laravel с PHP-FPM.
- `nginx` - веб-сервер Nginx.
- `db` - база данных MySQL.

### Dockerfile
`Dockerfile` описывает настройки для создания образа PHP-FPM, включая установку необходимых зависимостей и расширений PHP.

### Nginx Configuration
Файл `nginx.conf` содержит конфигурацию веб-сервера Nginx для обслуживания приложения Laravel.

### Init SQL
Файл `init.sql` используется для инициализации базы данных MySQL при первом запуске контейнера.

## Примечания
- Убедитесь, что порты, указанные в конфигурациях, не используются другими приложениями.
- Для внесения изменений в конфигурацию Docker, пересоздайте контейнеры с помощью `docker-compose up -d --build`.


