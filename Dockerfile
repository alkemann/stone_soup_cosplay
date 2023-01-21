FROM php:7.3 as base
WORKDIR /usr/src/app

# install git
RUN apt update
RUN apt install git unzip -y

# install php extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

# install php composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"

# install application
COPY ./src .

# composer install
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN composer update
RUN composer install

# copy server.php to webroot
RUN cp resources/setup/server.php webroot

# fix permissions
RUN chmod +x resources/bin/local

# set entrypoint
ENTRYPOINT ["/usr/src/app/resources/bin/local", "80"]
