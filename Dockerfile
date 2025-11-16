FROM nikolaik/php-node:php8.2-node20 AS builder

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN npm install && npm run build

FROM php:8.2-fpm

WORKDIR /app

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mbstring exif pcntl bcmath opcache


COPY . .
COPY --from=builder /app/vendor /app/vendor
COPY --from=builder /app/public/build /app/public/build

EXPOSE 8080

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=${PORT}"]
