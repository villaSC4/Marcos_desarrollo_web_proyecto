FROM php:8.2-apache

# Instalar dependencias del sistema y extensiones de PHP necesarias para Laravel y Filament
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libicu-dev \
    libpq-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip intl pdo pdo_pgsql bcmath opcache

# Habilitar mod_rewrite para Apache (crucial para las rutas de Laravel)
RUN a2enmod rewrite

# Cambiar el documento raíz de Apache a la carpeta public de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/x/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar los archivos del proyecto al contenedor
WORKDIR /var/www/html
COPY . .

# Instalar dependencias de PHP (sin las de desarrollo)
RUN composer install --no-dev --optimize-autoloader

# Configurar permisos correctos para Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80