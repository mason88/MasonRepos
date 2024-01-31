
# Popular PHP Repositories on GitHub

## Steps to install and run

    First, make sure you have docker installed.

    ```git clone https://github.com/mason88/MasonRepos.git```
    
    ```cd MasonRepos```
    
    ```cp .env.example .env```
    
    ```
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
    ```
    
    ```./vendor/bin/sail up -d```
    
    ```./vendor/bin/sail artisan key:generate```
    
    Open http://127.0.0.1 in web browser

## Notes on implementation

 - Uses Laravel, Blade, Sail/Docker, MySQL, Composer
 - Files of interest to review:
   - app/Models/Repo.php
   - app/Http/Controllers/RepoController.php
   - resources/views/index.blade.php
   - resources/views/show.blade.php
   - database/migrations/2024_01_30_032233_create_repos_table.php

