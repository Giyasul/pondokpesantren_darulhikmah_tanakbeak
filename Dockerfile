FROM php:8.4-cli

# ==============================
# Install dependencies
# ==============================
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install intl zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && rm -rf /var/lib/apt/lists/*

# ==============================
# PHP upload settings (BESARIN)
# ==============================
RUN echo "upload_max_filesize=200M" > /usr/local/etc/php/conf.d/uploads.ini \
 && echo "post_max_size=200M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "memory_limit=512M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "max_execution_time=300" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "max_input_time=300" >> /usr/local/etc/php/conf.d/uploads.ini

# ==============================
# Install Composer
# ==============================
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ==============================
# Set workdir
# ==============================
WORKDIR /var/www/html/

# ==============================
# Copy project
# ==============================
COPY . .

# ==============================
# Install Laravel deps + prepare storage
# ==============================
RUN composer install --no-dev --optimize-autoloader \
    && mkdir -p storage/app/livewire-tmp \
    && mkdir -p storage/framework/cache \
    && mkdir -p storage/framework/sessions \
    && mkdir -p storage/framework/views \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage \
    && chmod -R 775 bootstrap/cache

# ==============================
# Expose Railway port
# ==============================
EXPOSE 8080

# ==============================
# Runtime fix (PALING PENTING 🔥)
# ==============================
CMD sh -c "\
echo '🚀 Starting Laravel...' && \
chown -R www-data:www-data storage bootstrap/cache || true && \
chmod -R 775 storage bootstrap/cache && \
mkdir -p storage/app/livewire-tmp && \
chmod -R 775 storage/app/livewire-tmp && \
php artisan storage:link || true && \
php artisan config:clear && \
php artisan cache:clear && \
php artisan route:clear && \
php artisan view:clear && \
php artisan migrate --force && \
php artisan db:seed --class=AdminSeeder --force || true && \
php artisan serve --host=0.0.0.0 --port=8080"