FROM wordpress:php8.2-apache  

# COPY ./wp-config.php /var/www/html/wp-config.php
COPY ./php.ini /usr/local/etc/php/php.ini

RUN apt-get update -qq && \
    apt-get install -qy \
    git