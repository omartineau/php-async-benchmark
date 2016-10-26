FROM php:7


RUN requirements="libmcrypt-dev g++ libicu-dev" \
    && apt-get update && apt-get install -y $requirements && apt-get install libevent-dev && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mcrypt \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install intl \
    && pecl install libevent \
    && docker-php-ext-enable libevent
    && requirementsToRemove="g++" \
    && apt-get purge --auto-remove -y $requirementsToRemove

EXPOSE 1337 1337
COPY . /usr/src/workerman
WORKDIR /usr/src/workerman
CMD [ "php", "./php test-workerman.php start -d" ]