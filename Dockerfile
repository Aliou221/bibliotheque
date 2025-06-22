# Utilise PHP avec Apache
FROM php:8.2-apache

# Installer les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    git unzip zip curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif bcmath

# Active mod_rewrite pour Laravel
RUN a2enmod rewrite

# Installer Node.js 18 et Yarn
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g yarn

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers de ton projet
COPY . /var/www/html/

WORKDIR /var/www/html/

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Compiler les assets Vite
RUN yarn install && yarn build

# Donner les bonnes permissions à Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Lancer Apache
CMD ["apache2-foreground"]

