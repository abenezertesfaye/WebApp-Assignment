FROM php:8.0-apache
WORKDIR /var/www/html
RUN apt-get update && apt-get upgrade -y libmariadb-dev
RUN docker-php-ext-install mysqli
EXPOSE 80