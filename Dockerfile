# Usa una imagen base oficial de PHP 8.2 con FPM
FROM php:8.2-fpm

# Instala dependencias del sistema
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    sqlite3 \
    libsqlite3-dev \
    libpq-dev && \
    docker-php-ext-install pdo pdo_mysql pdo_sqlite pdo_pgsql mbstring zip exif pcntl

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crea directorio de trabajo
WORKDIR /var/www

# Copia archivos del proyecto
COPY . .

# Instala dependencias de PHP
RUN composer install --no-interaction

# Establece permisos para Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Expone el puerto del servidor PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
