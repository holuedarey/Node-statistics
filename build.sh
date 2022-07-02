#!/bin/bash
docker-compose build app
docker-compose up -d

docker-compose exec app php artisan migrate
if [ ! -f "vendor/autoload.php" ]; then
   docker-compose exec app composer install
   docker-compose exec app composer update
fi
if ( ! ${APP_KEY}); then
    docker-compose exec app php artisan key:generate
fi

if (! ${JWT_SECRET}); then
    docker-compose exec app php artisan jwt:secret
fi

