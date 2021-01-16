FROM php:8.0-cli
RUN pecl install xdebug-3.0.2 \
    && docker-php-ext-enable xdebug

RUN apt-get update && apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-install zip
  
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
