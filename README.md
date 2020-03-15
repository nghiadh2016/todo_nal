Hi, I will I will guide you to run this source code
This source code i use mysql and php
 
 1/ If you dowload my code in git public
   a/ you need setup environment to run it with php with another run
     - php coporser.phar install
     - php cp .env.example .env
     - php artisan key:generate
     - you open your mysql and import database with file todo.sql in roote folder, the database name i create is todo.
     - If you database has passwork or the database name you create with the other name please config in file .env
     - Run and relax
 2/ Database i have 2 table because them has 1-n relationship.