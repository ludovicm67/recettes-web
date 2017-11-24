#/bin/sh

cp .env.example .env
composer install
yarn && yarn run dev
php artisan key:generate
# php artisan migrate

