FROM php:7.4-fpm AS php-debug

WORKDIR /php-debug

COPY . /php-debug

RUN apt-get update && \
    apt-get install -y git && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    cd /php-debug && \
    composer require google/cloud-storage

CMD ["php", "/php-debug/main.php"]
