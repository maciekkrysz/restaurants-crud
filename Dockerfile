FROM php:8.0-fpm

RUN apt-get update
RUN apt-get install -y\
     git \
     curl \
     zip \
     unzip

RUN docker-php-ext-install pdo 
RUN docker-php-ext-install pdo_mysql
RUN curl -sS https://getcomposer.org/installer​ | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . /app/
RUN composer install
# uncomment to install l5-swagger and start publishing
# RUN composer require "darkaonline/l5-swagger"
# RUN php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"