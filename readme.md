PHP MongoDB Blog Prototype
=====================

A simple Blog using MongoDB as storage for posts and MySQL for users.

**NOTE**: This code needs the MongoDB Driver por PHP. You can find installation instructions at http://php.net/manual/en/set.mongodb.php

Stack used:
 - Laravel 5.3
 - PHP7.0
 - MongoDB
 - MySQL

Installation
------------

Clone the repo
```
git clone git@github.com:ezerw/php-mongo-blog-prototype.git
cd php-mongo-blog-prototype
```
Install dependencies
```
composer install
```

Set .env file
```
cp .env{.example,}
```

Migrate DB and Seed User's table for default admin user 
```
php artisan migrate --seed
```

Configure a virtual host or run a PHP built in server
```
php -S localhost:8000 -t public
```
OR
```
php artisan serve
```

### Default admin user details

```
email: 'admin@admin.com'
password: 'secret'
```
