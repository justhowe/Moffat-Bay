FROM php:8.1-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql
COPY public /var/www/html/
COPY config/ /var/www/config/
CMD ["apache2-foreground"]