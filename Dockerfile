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

RUN php artisan optimize:clear
RUN php artisan vendor:publish --tag=filament-assets --force
RUN php artisan filament:assets --force
RUN php artisan storage:link || true

EXPOSE 8080

CMD php -S 0.0.0.0:$PORT -t public
