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

....

./vendor/bin/sail npm install vue@latest vue-router@4
./vendor/bin/sail npm npm install --save-dev @vitejs/plugin-vue

change vite.config.js

add vue to defineConfig.plugins
vue({
    template: {
        transformAssetUrls: {
            base: null,
            includeAbsolute: false,
        },
    },
})

add resolve  defineConfig

resolve: {
    alias: {
        vue: 'vue/dist/vue.esm-bundler.js',
    },
},
