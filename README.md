# Zahtjevi

## Sitemski zahtjevi

Za uspješno pokretanje ove aplikacije potrebno je imati instaliran 
operacijski sustav Ubuntu 20.04, bilo kao nativna instalacija ili 
kao virtualni stroj.

Na Windows 10 je moguće instalirati Ubuntu 20.04 koristeći 
[WSL](https://www.google.com/search?client=firefox-b-d&q=kako+instalirati+wsl).

## Mrežni zahtjevi

Da bi se uspješno instalirala i pokrenula aplikacija potrebna je Internet veza.

# Pokretanje aplikacije

## Instalacija aplikacije

### Instalacija potrebnih paketa

Sva instalacija se odvija unutar terminala u Ubuntu OS-u.

1. Osigurati postojanje paketa `git`:
   1. provjera: `dpkg -l |grep git`
   1. instalacija: `sudo apt install git`
1. Osigurati postojanje paketa `mysql-server`:
    1. provjera: `dpkg -l |grep mysql-server`
    1. instalacija: `sudo apt install mysql-server`
1. Osigurati da servis za bazu radi:
   1. provjera: `sudo service mysql status`
   1. pokretanje: `sudo service mysql start` 
1. Osigurati postojanje paketa `php-fpm` (najmanje verzije 7.4):
    1. provjera: `dpkg -l |grep php-fpm`
    1. instalacija: `sudo apt install php-fpm`
    1. Ovisno o veličini slika potrebno je promijeniti dozvoljenu veličinu datoteka 
       koje se smiju uploadati:
       
        Kao `root` u datoteci `/etc/php/7.4/cli/php.ini` provjeriti je li `post_max_size` barem *20M* i provjeriti je li `upload_max_filesize` barem *5M*
        Ako namjeravat koristit `nginx` kao HTTP server iste postavke je potrebno provjeriti i u datoteci
       `/etc/php/7.4/fpm/php.ini`
1. Osigurati postojanje paketa `php-mysql`:
    1. provjera: `dpkg -l |grep php-mysql`
    1. instalacija: `sudo apt install php-mysql`       
1. Osigurati postojanje paketa `composer`:
   1. porvjera: `composer --version`
   1. instalacija: po uputama na [getcomposer.org](https://getcomposer.org/download/)
1. Koristeći proizvoljan alat, napraviti praznu mySQL bazu podataka i korisnika za nju

### Kloniranje repozitorija

1. Postaviti se u direktorij u kojemu će biti projekt (npr. `cd /var/www`)  
1. Klonirati repozitorij s Github-a naredbom  `git clone https://github.com/waddo99/news-site-pz.git`
1. Postaviti se u direktorij projekta `cd news-site-pz`

### Konfiguracija aplikacije

1. (Unutra proizvoljnog editora) Ući u datoteku `news-site-pz`   
1. Kopirati predložak *environment*-a u datoateku naziva `.env` (`cp .env.example .env`)    
1. U proizvoljnom editoru otvoriti `.env` datoteku i napraviti sljedeće:
   
   1. Pronaći `DB_DATABASE` i upisati naziv baze podataka koja je napravljena u koraku kreiranja baze 
   1. Pronaći `DB_USERNAME` i upisati korisničko ime korisnika za bazu podataka koja je napravljena u koraku kreiranja baze
   1. Pronaći `DB_PASSWORD` i upisati korisničku lozinku korisnika za bazu podataka koja je napravljena u koraku kreiranja baze

1. Pokrenuti narebu `composer install`
1. Pokrenuti narebu `php artisan key:generate`
1. Pokrenuti narebu `php artisan migrate --seed`
1. Pokrenuti narebu `php artisan storage:link`
1. Kopirati slike u javni direktorij `cp resources/images/image*.jpg public/storage`
   
# Pokretanje aplikacije

1. U direktoriju projekta pokrenuti narebu `php artisan serve`
1. Unutar proizvoljnog web preglednika otvoriti URL aplikacije: http://127.0.0.1:8000
1. Za pristup uređivanju artikala pojedinog korisnika ulogirati se kao `editor.user@site.com` s lozinkom `SuperDuperPassword`
1. Za pristup uređivanju svih artikala i administraciji korisnika ulogirati se kao `admin.user@site.com` s lozinkom `SuperPassword`
