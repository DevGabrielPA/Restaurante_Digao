#!/bin/sh
set -e

printf "APP_NAME=\"Restaurante Digao\"\n"       > .env
printf "APP_ENV=%s\n"    "${APP_ENV:-production}"  >> .env
printf "APP_KEY=%s\n"    "${APP_KEY}"               >> .env
printf "APP_DEBUG=%s\n"  "${APP_DEBUG:-false}"      >> .env
printf "APP_URL=%s\n"    "${APP_URL:-http://localhost}" >> .env
printf "LOG_CHANNEL=stderr\n"                       >> .env
printf "SESSION_DRIVER=file\n"                      >> .env
printf "CACHE_STORE=file\n"                         >> .env
printf "CACHE_DRIVER=file\n"                        >> .env

php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"
