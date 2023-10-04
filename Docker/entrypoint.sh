#! /bin/bash

# if vendor folder does not exist, run composer install
# if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
# fi


#if .env file does not exist, copy .env.example to .env
if [ ! -f ".env" ]; then
    echo "Creating env file for env $APP_ENV"
    cp .env.example .env
else
    echo "Env file exists"
fi


php artisan migrate
php artisan key:generate
# php artisan cache:clear
# php artisan config:clear
# php artisan route:clear

php artisan serve --port=$PORT --host=0.0.0.0 --env=.env
exec docker-php-entrypoint "$@"