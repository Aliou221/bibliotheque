# Étape 1 : Base PHP + Apache
FROM php:8.2-apache

# Étape 2 : Installer les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    git unzip zip curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif bcmath

# Étape 3 : Activer mod_rewrite pour Laravel
RUN a2enmod rewrite

# Étape 4 : Installer Node.js 18 et Yarn
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g yarn

# Étape 5 : Copier Composer depuis l'image officielle
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Étape 6 : Copier les fichiers de l'application Laravel
COPY . /var/www/html/

# Étape 7 : Définir le bon dossier web (public)
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Étape 8 : Adapter la config Apache
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html/

# Étape 9 : Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Étape 10 : Compiler les assets avec Vite
RUN yarn install && yarn build

# Étape 11 : Cache Laravel
RUN php artisan config:cache \
 && php artisan route:cache \
 && php artisan view:cache \
 && php artisan migrate --force

# Étape 12 : Fixer les permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

# Étape 13 : Forcer Apache à écouter sur le port 10000 (Render)
RUN sed -i 's/80/10000/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf
EXPOSE 10000

# Étape 14 : Démarrer Apache
CMD ["apache2-foreground"]
