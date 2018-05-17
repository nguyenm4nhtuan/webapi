Demo use Laravel framework before i want save time,

Server Requirements : 
 - PHP >= 7.1.3
 - PDO PHP Extension
 - MySQL >= 5.6
 
 
Install: 
 - Config project on web server : 
   - Recommend use Laravel Homestead virtual machine or virtual host 
  
 - Go to root directory and run command:
 - Install php packages: 
    php composer.phar install
 - Config connect database in file .env
 - Install database:
    php artisan migrate
 - Install data for test:      
    php artisan db:seed --class=CustomersTableSeeder
    
Api documents: 
   - Go to path 'YOUR_DOMAIN/docs' 
   - Can you test api on documents page

Refer : 
 https://laravel.com/docs/5.6/installation