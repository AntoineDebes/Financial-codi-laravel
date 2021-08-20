# Setup instructions

-   Write in the console " composer update ."
-   Go to PHPmyadmin and create a DATABASE with the name that you want.
-   In the shell write the following command " cp .env.example .env ."
-   //In the .env file edit the Database username and password and database name to be able to modify the database.
-   Write in the shell " php artisan migrate ." ( This command create your database schema in the phpmyadmin. )
-   Write in the shell " php artisan db:seed ." ( To inject fake data in the database. )


///////////////Done by hajar///////////////////////////////////////////////////
#create AuthController in Controllers
#composer require tymon/jwt-auth
#add tp providers:
'providers' => [
   ...

    Tymon\JWTAuth\Providers\LaravelServiceProvider::class,

   ...
],
#add to 'aliases' => [

    ...
    
    'JWTAuth' => Tymon\JWTAuth\Facades\JWTAuth::class,
   'JWTFactory' => Tymon\JWTAuth\Facades\JWTFactory::class,

    ...

],
#then add this command:
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
#then to generate secret key:
php artisan jwt:secret
#update User.php model
#open config folder and open auth.php
 update 'defaults' => [
        'guard' => 'web',====put it api
        'passwords' => 'users',
    ],
    and  'api' => [
            'driver' => 'token',=======put it jwt
            'provider' => 'users',
            'hash' => false,
        ],


  ##create auth controller and put the functions register and login in it       


  and routes to api