FROM php:8.4-fpm-alpine

ARG UID
ARG GID

WORKDIR /var/www

RUN apk add --no-cache \
    shadow \
    build-base \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libwebp-dev \
    zip \
    jpegoptim \
    optipng \
    pngquant \
    gifsicle \
    vim \
    unzip \
    git \
    curl \
    postgresql-dev \
    oniguruma-dev \
    libzip-dev \
    gd-dev \
    icu-dev \
    linux-headers \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) \
        pdo \
        pdo_pgsql \
        mbstring \
        zip \
        exif \
        pcntl \
        bcmath \
        gd \
        intl \
    && apk del build-base

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN groupadd -g ${GID} -o www && \
    useradd -u ${UID} -o -g www -m -s /bin/sh www

RUN chown -R www:www /var/www

RUN echo '#!/bin/sh' > /usr/local/bin/php-fpm-healthcheck && \
    echo 'set -e' >> /usr/local/bin/php-fpm-healthcheck && \
    echo 'php-fpm -t' >> /usr/local/bin/php-fpm-healthcheck && \
    chmod +x /usr/local/bin/php-fpm-healthcheck

USER www

EXPOSE 9000

CMD ["php-fpm"]
