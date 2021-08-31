FROM actovosgroup/php-7.3-nginx:latest

WORKDIR /app

COPY composer.* ./
RUN composer install

# bad command for testing
COPY foo bar

COPY . .

EXPOSE 80
