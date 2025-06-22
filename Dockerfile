FROM php:8.2-apache

# Installer les extensions PHP
RUN apt-get update && apt-get install -y \
    git unzip zip curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif bcmath

# Activer mod_rewrite
RUN a2enmod rewrite

# Installer Node.js & Yarn
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g yarn

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers Laravel
COPY . /var/www/html

# ✅ Changer le document root vers le dossier public de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# ✅ Appliquer la config Apache pour prendre en compte le bon dossier
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Compiler les assets avec Vite
RUN yarn install && yarn build

# Fixer les permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Démarrer Apache
CMD ["apache2-foreground"]
