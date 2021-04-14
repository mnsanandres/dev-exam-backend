FROM php:7-apache

ARG user
ARG uid

RUN docker-php-ext-install pdo_mysql
RUN a2enmod rewrite

ADD . /var/www

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user && \
    chown -R $user:$user /var/www

USER $user

WORKDIR /var/www

RUN composer install

RUN ls -lah /var/www

CMD php artisan serve --host=0.0.0.0 --port=8000

EXPOSE 8000
