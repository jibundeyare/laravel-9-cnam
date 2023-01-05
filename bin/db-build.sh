#!/bin/bash

# équivalent migrate:fresh
# php artisan db:wipe
# php artisan migrate

php artisan migrate:fresh

# sans paramètre, c'est la classe DatabaseSeeder qui est utilisée
php artisan db:seed
