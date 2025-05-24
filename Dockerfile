# Étape 1 : Base PHP + extensions nécessaires
FROM php:8.2-fpm

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl gd

# Installer Composer (officiel)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www

# Copier tous les fichiers de l'application
COPY . .

# Installer les dépendances Laravel via Composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Donner les permissions à Laravel (storage et bootstrap/cache)
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 storage bootstrap/cache

# Exposer le port 8000
EXPOSE 8000

# Commande pour lancer Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
