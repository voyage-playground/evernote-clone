FROM actovosgroup/php-7.3-nginx:latest

WORKDIR /app

COPY scripts/run.sh /init.d
RUN chmod +x /init.d/run.sh

COPY composer.* ./
RUN composer install

COPY . .

EXPOSE 80
