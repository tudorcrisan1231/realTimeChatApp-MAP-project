FROM php:8.1 as php

RUN apt-get update -y
#extension for php
RUN apt-get install -y unzip libpq-dev libcurl4-gnutls-dev 
RUN docker-php-ext-install pdo pdo_mysql bcmath

WORKDIR /var/www
COPY . .

COPY --from=composer:2.5.8 /usr/bin/composer /usr/bin/composer

ENV PORT=8000
ENTRYPOINT [ "Docker/entrypoint.sh" ]

#node
# FROM node:20.8.0 as node

# WORKDIR /var/www
# COPY . .

# RUN npm install

# VOLUME /var/www/node_modules