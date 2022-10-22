FROM php:7.4.3-apache

WORKDIR /var/www/html/
COPY . .
#COPY ./apache.conf /etc/apache2/sites-available/000-default.conf

RUN apt-get update &&\
    apt-get install -y libaprutil1-dbd-mysql &&\
    a2enmod authn_dbd &&\
    a2enmod authn_socache &&\
    docker-php-ext-install mysqli &&\
    service apache2 restart


