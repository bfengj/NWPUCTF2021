FROM php:7.3.4-apache

COPY src /var/www/html
COPY flag.sh /flag.sh
COPY ./php.ini /usr/local/etc/php/php.ini
RUN chmod 777 /flag.sh && \
    /flag.sh

