FROM nikolaik/python-nodejs:python3.10-nodejs20 AS builder

WORKDIR /app
COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

RUN npm install && npm run build

FROM php:8.2-cli

WORKDIR /app
COPY . .
COPY --from=builder /app/public/build /app/public/build
COPY --from=builder /usr/local/bin/composer /usr/local/bin/composer

EXPOSE 8080

CMD php artisan serve --host 0.0.0.0 --port $PORT
