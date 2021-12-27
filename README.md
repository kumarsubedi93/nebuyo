# Nebuyo

#Requirements
1) PHP >= 7.2
2) Mysql >=  5.7

# Installation

1) Create database.
3) Copy `.env.example` to `.env`
4) Set valid database credentials of env variables `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`
5) Run `composer install`
```php
php artisan key:generate
```
```php
php artisan serve
```
6) Access the application. Example: `http://127.0.0.1:8000`
7) Login: `root@sujanecommerce.com` Password: `admin`

### Database Setup
 For database setup there is no proper migrations created so We should need to dump the development database and import it on server.
 