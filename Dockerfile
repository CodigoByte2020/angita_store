FROM php:8.4-cli

RUN apt-get update && apt-get install -y libicu-dev libzip-dev unzip \
    && docker-php-ext-install intl zip pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .
RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN mkdir -p storage/framework/{cache,sessions,views} && chmod -R 777 storage bootstrap/cache
RUN php artisan config:clear && php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan migrate --force

EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
