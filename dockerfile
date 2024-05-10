FROM php:8.2-fpm

RUN apt-get update && apt-get install -y composer

WORKDIR /var/www/html

COPY composer.json composer.lock .
RUN composer install --prefer-dist

COPY . .

EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]
