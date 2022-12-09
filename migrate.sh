#!/bin/bash

php artisan db:wipe && php artisan migrate
