# Используем официальный образ PHP с предустановленным FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# Установка зависимостей для PHP и других инструментов
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    nginx

# Установка расширений PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Установка рабочей директории в контейнере
WORKDIR /var/www

# Копирование исходного кода приложения в контейнер
COPY . /var/www

# Копирование конфигурации Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Установка зависимостей Composer
# Убедитесь, что composer.json и composer.lock находятся в корневой директории вашего проекта
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Очистка кэша apt-get для уменьшения размера образа
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Запуск Nginx и PHP-FPM
CMD service nginx start && php-fpm

# Открытие портов 80 и 9000 для веб-сервера и PHP-FPM
EXPOSE 80 9000
