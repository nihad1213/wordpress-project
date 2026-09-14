FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libfreetype6-dev \
    libonig-dev \
    unzip \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-jpeg --with-webp --with-freetype \
    && docker-php-ext-install -j"$(nproc)" \
    gd \
    mysqli \
    zip \
    exif \
    opcache \
    mbstring

RUN mkdir -p /var/www/html/wp-content/uploads \
    && chown -R www-data:www-data /var/www/html

RUN a2enmod rewrite

COPY php.ini /usr/local/etc/php/conf.d/wordpress.ini
COPY apache-overrides.conf /etc/apache2/conf-available/apache-overrides.conf
RUN a2enconf apache-overrides

WORKDIR /var/www/html
