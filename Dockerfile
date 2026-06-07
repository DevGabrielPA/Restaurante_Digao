FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libxml2-dev libonig-dev \
    && docker-php-ext-install zip mbstring xml pdo \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN npm ci && npm run build

RUN mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8000

CMD ["sh", "start.sh"]
