FROM jaanonim/docker-apache2-php-postgresql
WORKDIR /var/www/html/
COPY . .


























# FROM php:7.4.3-apache
# WORKDIR /var/www/html/
# COPY . .
# RUN apt-get update &&\
#     apt-get install -y libaprutil1-dbd-pgsql &&\
#     apt-get install -y libpq-dev &&\
#     docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql &&\
#     docker-php-ext-install pdo_pgsql &&\
#     a2enmod authn_dbd &&\
#     a2enmod authn_socache &&\
#     a2enmod rewrite &&\
#     service apache2 restart

