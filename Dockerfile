FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install intl zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN mkdir -p database
RUN touch database/database.sqlite
RUN chmod -R 775 storage bootstrap/cache database

EXPOSE 8080

CMD php artisan serve --host=0.0.0.0 --port=8080
