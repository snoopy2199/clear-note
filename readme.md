# Clear Note

Clear Note is a online Cornell note service

## Based On
- [Laravel](https://laravel.com/) - composer
- [jQuery](https://jquery.com/) - CDN
- [Bootstrap](http://getbootstrap.com/) - CDN
- [Font Awesome](http://fontawesome.io/) - CDN
- [PHPMailer](https://github.com/PHPMailer/PHPMailer) - composer
- [Hashids for php](http://hashids.org/php/) - composer

## Getting Started
Before you begin, please make sure that you have installed **php**, **composer**, and **git**
1. Download this project
```
git clone https://github.com/snoopy2199/clear-note.git
```
2. Composer install
```
conposer install
```
3. Make your own env file
```
cp .env.example .env
php artisan key:generate
vim .env
```
4. Migrate database
```
php artisan migrate
```
5. Launch
```
php artisan serve
```