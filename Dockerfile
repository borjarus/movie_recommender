FROM php:fpm

RUN apt-get update && apt-get install -y \
    git \
    zip \
    curl

WORKDIR /app
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY . .
EXPOSE 8000/tcp

ENTRYPOINT ["php", "-S", "0.0.0.0:8000", "src/index.php"]