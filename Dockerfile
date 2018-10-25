FROM php:7.2-apache


RUN apt-get update
RUN docker-php-ext-install pdo_mysql

COPY . /app
COPY composer.* /app/
WORKDIR /app
ONBUILD RUN php artisan migrate