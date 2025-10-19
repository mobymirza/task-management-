FROM php:8.2-fpm-alpine
RUN apk update && apk add --no-cache \
    linux-headers \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    icu-dev \
    zlib-dev \
    libxml2-dev \
    mysql-client \
    curl  \
    git  \
    unzip \
    busybox-suid \
    && docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-install intl
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer --version \
