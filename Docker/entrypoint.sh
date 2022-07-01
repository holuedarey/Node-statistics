#!/bin/bash
if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interation
fi

if [! -f ".env"]; then
    echo "creating env file for env ${APP_ENV}"
    cp .env.example .env
    echo "env file created for env ${APP_ENV}"
else
    echo "env file already exists"
fi
if [! ${APP_KEY}]; then
    php artisan key:generate
fi

php artisan migrate
php artisan db:seed
php artisan optimize:clear

php artisan serve --port=$PORT --host=0.0.0.0  --env=.env
exec docker-php-entrypoint "$@"
