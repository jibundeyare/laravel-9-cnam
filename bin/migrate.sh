#!/bin/bash

# supprime la BDD puis la recréé
php artisan db:wipe && php artisan migrate
