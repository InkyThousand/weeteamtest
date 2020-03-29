FROM php:7.2-fpm

ARG WEB_USER
ARG WEB_GROUP
ARG PHP_ROOT_DIR

COPY www.conf ${PHP_ROOT_DIR}/php-fpm.d/www.conf
RUN echo 'memory_limit = -1' >> ${PHP_ROOT_DIR}/php/conf.d/docker-php-memlimit.ini;

RUN apt-get update && apt-get install -y \
    git autoconf tzdata openntpd coreutils \
    libmcrypt-dev libxpm-dev libvpx-dev \
    libpng-dev libxml2-dev

RUN docker-php-ext-configure intl \
    && docker-php-ext-configure opcache

RUN docker-php-ext-install -j$(nproc) gd iconv pdo pdo_mysql \
    bcmath mbstring json xml xmlrpc zip intl opcache

# Install composer
RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer

RUN usermod -u 1000 ${WEB_USER} \
 && groupmod -g 1000 ${WEB_GROUP} \
 && chgrp -R staff ${PHP_ROOT_DIR}/php-fpm.d/www.conf
