# Instlacija

1. Instalirajte ili osigurajte pristup Ubuntu operacijskom sustavu verzije 20.04, 
   za instalaciju ovog projekta je potrebno osnovno zanjane korštenja Ubuntu command line-a 
   (Može se instalirati Ubuntu subsystem for Windows za besplatno preko Windows store-a)
1. Instalirati Composer (unutar Ubuntu OS-a) naredbom `palceholder-naredba` (getcomposer.org)
1. Instalirati git (unutar Ubuntu OS-a) naredbom `palceholder-naredba`
1. Instalirati php-fpm (unutar Ubuntu OS-a) naredbom `palceholder-naredba`
   (U cli/php.ini datoteci provjeriti je li `post_max_size` barem 20M i provjeriti je li `upload_max_filesize` barem 5M)
1. Instalirati mysql server (unutar Ubuntu OS-a) naredbom palceholder-naredba
1. (Koristeći proizvoljan alat) Napraviti praznu bazu podataka i korinika za nju 
1. Naredbom (unutar Ubuntu OS-a) `github: git pull https://github.com/waddo99/news-site-pz.git` povući s Github-a projektni zadatak
1. (Unutra proizvoljnog editora) Ući u datoteku `news-site-pz`    
1. Otvoriti `.env` datoteku i napraviti sljedeće:
   
   1. Pronaći `DB_DATABASE` i upistai naziv baze podataka koju ste napravili u 6. koraku 
   1. Pronaći `DB_USERNAME` i upistai korisničko ime korisnika za tu bazu podataka
   1. Pronaći `DB_PASSWORD` i upistai korisničku lozinku korisnika za tu bazu podataka

1. (Unutar Ubuntu OS-a) pokrenuti narebu `composer install`
1. (Unutar Ubuntu OS-a) pokrenuti narebu `php artisan key:generate`
1. (Unutar Ubuntu OS-a) pokrenuti narebu `php artisan migrate --seed`
1. (Unutar Ubuntu OS-a) pokrenuti narebu `php artisan storage:link`
1. (Unutar Ubuntu OS-a) Prebaciti se u direktorij projekta i pokrvcenuti narebu `php artisan serve`
1. Unutar proizvoljnog web preglednika otoći na strancu URL-a: http://127.0.0.1:8000

# Code

## Code that is from other packages

### `laravel/breeze` classes and views

Views: everything under `resources/views/auth` and everything under `resources/views/layouts`.
Classes: everything under `app/Http/Controllers/Auth`
Routes: `auth.php` and `web.reeeze.php`
