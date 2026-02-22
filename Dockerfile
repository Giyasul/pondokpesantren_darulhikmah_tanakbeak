FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install intl zip