#Simple Import excel with jobs
# Akkar IT

#.env setup
```
cp .env.example .env
```
#setup database (name, username, password)
```
DB_DATABASE=dbname
DB_USERNAME=root
DB_PASSWORD=

QUEUE_CONNECTION=database
```


 
#Intall all the Dependencies
- please run
    
 ```
composer install 
php artisan key:generate
php artisan migrate
npm install && npm run dev
php artisan queue:table
php artisan migrate
php artisan queue:work
```
