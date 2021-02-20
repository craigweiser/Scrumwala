FROM php:5.6.30-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    && docker-php-ext-install mcrypt pdo_mysql mbstring