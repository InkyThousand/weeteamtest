FROM php:7.2-fpm-alpine

ARG WEB_USER
ARG WEB_GROUP
ARG PHP_ROOT_DIR

COPY www.conf ${PHP_ROOT_DIR}/php-fpm.d/www.conf
RUN echo 'memory_limit = -1' >> ${PHP_ROOT_DIR}/php/conf.d/docker-php-memlimit.ini;

RUN apk upgrade --update && apk --no-cache add \
    git autoconf tzdata openntpd libcurl curl-dev coreutils \
    libmcrypt-dev freetype-dev libxpm-dev libjpeg-turbo-dev libvpx-dev \
    libpng-dev libressl-dev libxml2-dev postgresql-dev icu-dev \
    yarn

RUN apk add --no-cache --virtual build-dependencies icu-dev libxml2-dev freetype-dev libpng-dev libjpeg-turbo-dev g++ make autoconf

RUN docker-php-ext-configure intl \
    && docker-php-ext-configure opcache \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ \
    --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/ \
    --with-xpm-dir=/usr/include/

RUN docker-php-ext-install -j$(nproc) gd iconv pdo pdo_mysql pdo_pgsql curl \
    bcmath mbstring json xml xmlrpc zip intl opcache

# Install composer
RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer

RUN usermod -u 1000 ${WEB_USER} \
 && groupmod -g 1000 ${WEB_GROUP} \
 && chgrp -R staff ${PHP_ROOT_DIR}/php-fpm.d/www.conf
