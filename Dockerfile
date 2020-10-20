FROM actovosgroup/php-7.3-nginx:latest

WORKDIR /app

COPY composer.* ./
RUN composer install

COPY . .

EXPOSE 80
