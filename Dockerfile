FROM actovosgroup/php-7.3-nginx:latest

ENV PUPPETEER_SKIP_CHROMIUM_DOWNLOAD=true \
    PUPPETEER_EXECUTABLE_PATH=/usr/bin/chromium-browser

WORKDIR /app

COPY scripts/run.sh /init.d
RUN chmod +x /init.d/run.sh

COPY composer.* ./
RUN composer install

COPY . .

EXPOSE 80
