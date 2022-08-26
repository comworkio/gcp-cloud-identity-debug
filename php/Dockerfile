FROM php:7.4-fpm AS php-debug

WORKDIR /php-debug

COPY . /php-debug

RUN apt-get update && \
    apt-get install -y zlib1g-dev libicu-dev g++ git libzip-dev unzip libssl-dev libxml2-dev php-soap supervisor librabbitmq-dev libssh-dev libpng-dev libjpeg-dev libfreetype6-dev nodejs && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    cd /php-debug && \
    composer require google/cloud-storage

CMD ["php", "/php-debug/main.php"]
