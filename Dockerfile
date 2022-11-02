FROM php:7.2-apache
RUN apt-get update && apt-get -y install apache2-utils libaprutil1-dbd-mysql \
    && docker-php-ext-install mysqli && docker-php-ext-enable mysqli && a2enmod authn_dbd && a2enmod rewrite
