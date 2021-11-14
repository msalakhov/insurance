FROM php:8.0-fpm

RUN apt update \
    && apt install -y \
	zlib1g-dev \
	g++ \
	git \
	libicu-dev \
	zip \
	libzip-dev \
	libpng-dev \
	libjpeg62-turbo-dev \
	libfreetype6-dev\
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install intl

WORKDIR /var/www/lux

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

