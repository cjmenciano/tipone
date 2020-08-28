# tipone

## User's Guide

## Database configuration

## If you are using MySQL:

>first, create database in your localhost server e.g.(phpMyAdmin)

>second, configure .env file in your project root.

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE= your database name

DB_USERNAME= your username

DB_PASSWORD= your password

## If you are using PostgreSQL:

>first, create database in your localhost server e.g.(pgAdmin)

>second, configure .env file in your project root.

DB_CONNECTION=pgsql

DB_HOST=127.0.0.1

DB_PORT=5432

DB_DATABASE= your database name

DB_USERNAME= your username

DB_PASSWORD= your password

After setting up database,

Run this command on your project root, using terminal.

>php artisan migrate -> to create tables in your database.

>php artisan db:seed -> to insert data on your tables.

## NOW YOUR READY TO GO.

## To create/fixed the storage/

Run this command on your project root, using terminal.

>rm public/storage

>php artisan storage:link

## To access Administrator login,

>localhost/crm/public/admin

>Username/Email: admin@admin.com

>Password: password

###### Functionality
Create, read, update & delete.

## To access User login
>localhost/crm/public

>Username/Email: cjmenciano@gmail.com

>Password: 12345678

