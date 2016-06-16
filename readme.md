# Web Gametch

A sample web application of game topic matching

## Installation

Assets

    npm install
    ./node_modules/.bin/bower install
    npm run prod

Composer

    wget https://getcomposer.org/composer.phar
    php composer.phar install
    php artisan optimize

Environment

    cp .env.example .env

Generate key

    php artisan key:generate
    php artisan jwt:generate

Edit settings

    vim .env

Steup database

    touch storage/database.sqlite
    php artisan migrate

Seed database

    php artisan db:seed

Seeded user

    user / 12345678
    admin / 12345678

Create storage symlink

    # Make symlink `storage` to `../storage/app/public`

    cd public
    ln -s ../storage/app/public storage
