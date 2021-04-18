FROM php:7.0-fpm
MAINTAINER Szabolcs Szabo <szabolcs.szabo@webpont.com>
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /var/www
#RUN composer install
