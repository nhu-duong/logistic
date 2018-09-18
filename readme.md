# Logistic
Logistic project was built to manage the business of sending and receiving goods.
You can manage your orders, agency, sender, receiver, goods, ships and ports using this application.
Allow you to export Delivery Note in pdf, this could save you a lot of time.

## Laravel PHP Framework

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Purpose
This is a project that I built in my free time to demonstrate the features of Laravel PHP Framework in building web application.

## License

The project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

# Installation
## System requirements
- PHP version between 5.5.9 - 7.1.*
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- Composer 1.6.3+

## Installation steps
Checkout source code
```sh
$ cd /var/www
$ git clone https://bitbucket.org/duongtannhu/logistic.git
```
Install dependencies
```sh
$ cd logistic
$ composer install
```
Prepare environment params
```sh
// Create environment configuration from sample file
$ cp .env.example .env
// Generate application secret key
$ php artisan key:generate
// Edit database configuration in file .env
$ vi .env
// Grant write permissions for these folders: storage, bootstrap/cache
//
```
Create database tables and initial data
```sh
$ php artisan migrate --seed
```
Configure web server point requests to public/index.php
```sh
server {
        listen 80;
        listen [::]:80;

        root /var/www/logistic/public;

        # Add index.php to the list if you are using PHP
        index index.php index.html index.htm index.nginx-debian.html;

        server_name logistic.local;

        location / {
           # try_files $uri $uri/ =404;
           try_files $uri $uri/ /index.php?$query_string;
        }

        # pass PHP scripts to FastCGI server
        #
        location ~ \.php$ {
               include snippets/fastcgi-php.conf;

               # With php-fpm (or other unix sockets):
               fastcgi_pass unix:/var/run/php/php7.2-fpm.sock;
               # With php-cgi (or other tcp sockets):
               # fastcgi_pass 127.0.0.1:9000;
        }

        # deny access to .htaccess files, if Apache's document root
        # concurs with nginx's one

        location ~ /\.ht {
               deny all;
        }
}
```