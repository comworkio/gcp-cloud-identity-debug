FROM php:7.4-fpm AS sendcolis

WORKDIR /var/www/sendibox

USER root

COPY 

RUN apt-get update && \
    curl -sL https://deb.nodesource.com/setup_12.x | bash && \
    apt-get install -y zlib1g-dev libicu-dev g++ git libzip-dev unzip libssl-dev libxml2-dev php-soap supervisor librabbitmq-dev libssh-dev libpng-dev libjpeg-dev libfreetype6-dev nodejs && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    docker-php-ext-configure intl && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install intl zip opcache bcmath soap sockets calendar gd && \
    docker-php-ext-enable  soap && \
    pecl install mongodb && \
    echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/20-mongodb.ini && \
    mkdir -p /.composer/ && \
    chown -R :1000 /.composer/ && \
    chmod 777 -R /.composer/ && \
    pecl install amqp  && \
    docker-php-ext-enable amqp  && \
    mkdir -p /var/www/sendibox/var/sessions/prod && \
    chmod 777 -R /var/www/sendibox/var/sessions/prod && \
    sed -i 's/^\(\[supervisord\]\)$/\1\nnodaemon=true/' /etc/supervisor/supervisord.conf && \
    chown -R 1000:1000 /var && \
    chmod 777 -R /var && \
    export ELASTIC_HOST="http://localhost:9200" && \
    export ELASTIC_USERNAME="changeit" && \
    export ELASTIC_PASSWORD="changeit" && \
    composer install && \
    npm install && \
    npm run build -f && \
    bin/console cache:clear && \
    apt remove -y nodejs

CMD php-fpm

EXPOSE 9000


mkdir test-gcs
cd test-gcs
composer require google/cloud-storage
echo "toto" > test.txt