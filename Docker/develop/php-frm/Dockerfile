FROM php:7.3-fpm

RUN apt-get update && apt-get install -y \
    curl \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev zlib1g-dev libzip-dev zip unzip libicu-dev g++ libmagickwand-dev --no-install-recommends libxml2-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && pecl install mcrypt-1.0.3 \
    && docker-php-ext-enable mcrypt\
    && docker-php-ext-install mbstring zip xml gd mysqli pdo_mysql \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && pecl install xdebug-2.7.1 \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-install exif
RUN docker-php-ext-configure exif \
    --enable-exif

COPY ./php.ini /usr/local/etc/php/php.ini

COPY ./xdebug.ini  /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /var/www
