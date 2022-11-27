#FROM php:7.4.3-apache
#FROM php:7.3-fpm
#WORKDIR /var/www/html/
#COPY . .
#RUN apt-get update &&\
#    apt-get install -y libpq-dev &&\
#    docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql &&\
#    docker-php-ext-install pdo_pgsql
#RUN apt-get install -y libaprutil1-dbd-pgsql &&\
#    a2enmod authn_dbd &&\
#    a2enmod authn_socache &&\
#    service apache2 restart


FROM jaanonim/docker-apache2-php-postgresql
WORKDIR .
COPY . ./app