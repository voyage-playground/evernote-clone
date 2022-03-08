FROM voyageapp/php:7.3-fpm-alpine-nginx

WORKDIR /app

COPY composer.* ./
RUN composer install

COPY . .

EXPOSE 80
