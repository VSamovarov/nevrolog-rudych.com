FROM php:7.4-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

RUN install-php-extensions mysqli pdo_mysql gd gmagick gettext xdebug zip exif pcntl bcmath intl memcache memcached tidy

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $user
