FROM php:8.2-apache

# Installe les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Installe Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copie les fichiers de l'application
COPY . /var/www/html/

# Change le répertoire de travail
WORKDIR /var/www/html

# Donne les bonnes permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Active le mode de réécriture Apache
RUN a2enmod rewrite
