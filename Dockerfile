# Dockerfile Base image
FROM php:8.2-cli

# Install GD extension for JPGraph, curl for fetching remote data, and unzip for Composer
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    curl \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip


# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory
WORKDIR /var/www/html

# Copy the application files to the container
COPY . /var/www/html

# Install PHP dependencies
RUN composer install

# # Command to run the PHP built-in server on port 8000
CMD ["php", "-S", "0.0.0.0:8000", "-t", "/var/www/html"]

RUN usermod -u 1000 www-data
RUN chown -R www-data:www-data /var/www/html
