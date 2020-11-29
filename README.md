<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## How to run
I suggest using XAMPP. Change .env file with your database name.
- composer install
- php artisan migrate:refresh --seed 
- php artisan serve

*--seed will seed database with users check isp-project/database/seeders/DatabaseSeeder.php 
