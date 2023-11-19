FROM php:8.1-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

COPY public /var/www/html/

COPY config.php /var/www/config/config.php

# TODO PHP_INI_DIR is /usr/local/etc/php

CMD ["apache2-foreground"]