#!/bin/bash
set -e

echo "Deployment started ..."

# Enter maintenance mode
(php artisan down) || true

# Pull latest
git pull origin master

# Install composer dependencies
export COMPOSER_ALLOW_SUPERUSER=1
composer dump-autoload
composer install

# Run database migrations
php artisan migrate --force

# Clear the old cache
php artisan clear-compiled

# Recreate cache
php artisan optimize

# Compile npm assets
npm cache clean --force
rm -rf node_modules
npm install
npm run prod

# Exit maintenance mode
php artisan up

echo "Deployment finished!"