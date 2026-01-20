FROM php:8.3-apache

# Defining working directory
WORKDIR /var/www/html

# Installing system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    sqlite3 \
    && docker-php-ext-install pdo_sqlite zip

# Enabling Apache mod_rewrite for nice URLs
RUN a2enmod rewrite

# Installing Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copying application files
COPY . .

# Setting DocumentRoot to /public (Best Practice)
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Installing Dependencies (Production)
RUN composer install --no-dev --optimize-autoloader

# Setting permissions for Web Server
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html

EXPOSE 80
