# Installation

1. On ubuntu (20.04)
1. Install composer (getcomposer.org)
1. Install git
1. Install php-fpm
   (check if post_max_size is at least 20M alos check if upload_max_filesize is at least 5M in cli/php.ini)
1. Install mysql server
1. Create a database and a user for that database   
1. Pull from github: git pull https://github.com/waddo99/news-site-pz.git
1. Change directory to `news-site-pz`    
1. Open `.env` file and
   
   1. Find `DB_DATABASE` and fill in the database name 
   1. Find `DB_USERNAME` and fill in the database username
   1. Find `DB_PASSWORD` and fill in the database username password

1. Run `composer install`
1. Run `php artisan key:generate`
1. Run `php artisan migrate --seed`
1. Run `php artisan storage:link`
1. Go to the project folder and run `php artisan serve`
1. Go to http://127.0.0.1:8000

# Code

## Code that is from other packages

### `laravel/breeze` classes and views

Views: everything under `resources/views/auth` and everything under `resources/views/layouts`.
Classes: everything under `app/Http/Controllers/Auth`
Routes: `auth.php` and `web.reeeze.php`
