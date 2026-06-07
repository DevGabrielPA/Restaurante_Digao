#!/bin/sh
set -e

# Cria .env a partir das variáveis de ambiente do Railway
cat > .env <<EOF
APP_NAME="Restaurante Digao"
APP_ENV=${APP_ENV:-production}
APP_KEY=${APP_KEY}
APP_DEBUG=${APP_DEBUG:-false}
APP_URL=${APP_URL:-http://localhost}

LOG_CHANNEL=stderr
LOG_LEVEL=debug

SESSION_DRIVER=file
SESSION_LIFETIME=120

CACHE_STORE=file
CACHE_DRIVER=file
EOF

# Garante diretórios com permissão de escrita
mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache
chmod -R 775 storage bootstrap/cache

php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

php artisan serve --host=0.0.0.0 --port=$PORT
