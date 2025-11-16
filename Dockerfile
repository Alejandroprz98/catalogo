FROM php:8.2-cli AS builder

WORKDIR /app

RUN apt-get update && apt-get install -y curl gnupg unzip \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN npm install && npm run build

FROM php:8.2-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev unzip zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mbstring exif pcntl bcmath opcache

COPY . .
COPY --from=builder /app/vendor /app/vendor
COPY --from=builder /app/public/build /app/public/build

EXPOSE 8080

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=${PORT}"]
