FROM node:20-slim AS builder

RUN apt-get update && apt-get install -y \
    php-cli \
    php-common \
    php-curl \
    php-mbstring \
    php-xml \
    php-zip \
    php-mysql \
    php-gd \
    php-intl \
    php-bcmath \
    php-opcache \
    curl \
    unzip \
    && apt-get clean

RUN curl -sS https://getcomposer.org/installer \
    | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . .


RUN composer install --no-dev --optimize-autoloader

RUN npm install
RUN npm run build

FROM php:8.2-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    php-mysql \
    php-mbstring \
    php-xml \
    php-curl \
    php-gd \
    php-bcmath \
    php-intl \
    php-zip \
    unzip \
    && apt-get clean

COPY . .
COPY --from=builder /app/vendor /app/vendor
COPY --from=builder /app/public/build /app/public/build

EXPOSE 8080

CMD php artisan serve --host 0.0.0.0 --port $PORT
