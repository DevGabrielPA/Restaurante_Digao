#!/bin/sh

printf "APP_NAME=\"Restaurante Digao\"\n"              > .env
printf "APP_ENV=%s\n"    "${APP_ENV:-production}"       >> .env
printf "APP_KEY=%s\n"    "${APP_KEY:-base64:Xlk3kZbX9yxl9dWpBfJ3mgJBzgtjJYYaTaLPtDzdXrY=}" >> .env
printf "APP_DEBUG=%s\n"  "${APP_DEBUG:-false}"          >> .env
printf "APP_URL=%s\n"    "${APP_URL:-http://localhost}"  >> .env
printf "LOG_CHANNEL=stderr\n"                           >> .env
printf "SESSION_DRIVER=file\n"                          >> .env
printf "CACHE_STORE=file\n"                             >> .env
printf "CACHE_DRIVER=file\n"                            >> .env

mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache
chmod -R 775 storage bootstrap/cache

php artisan config:clear  || true
php artisan config:cache  || true
php artisan route:cache   || true
php artisan view:cache    || true

php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"
