# install laravel
composer create-project --prefer-dist laravel/laravel:^10.0 crm_light

cd crm_light

nano .env

# install sail
composer require laravel/sail --dev
php artisan sail:install

# change .env 

DB_DATABASE=crm
DB_USERNAME=root
DB_PASSWORD=password

./vendor/bin sail up -d

# all later commands will work with sail

./vendor/bin/sail php --version
./vendor/bin/sail artisan --version
./vendor/bin/sail composer --version
./vendor/bin/sail npm --version

./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan storage:link

