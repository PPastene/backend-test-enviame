FROM php:7.4-fpm as base-build

WORKDIR /var/www/html

RUN apt-get update && apt-get upgrade -y \
    build-essential \
    libpq-dev \
    mariadb-client \
    unzip \
    zip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql mysqli
