#!/bin/sh
docker rm -f php;
docker run -d --name php -p 80:80 -v ./html:/var/www/html -v ./php-conf.d/php.ini:/usr/local/etc/php/conf.d/custom-php.ini php
