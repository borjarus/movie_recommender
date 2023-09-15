FROM php:fpm

RUN apt-get update && apt-get install -y \
    git \
    zip \
    curl

WORKDIR /app
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY . .

CMD tail -f /dev/null