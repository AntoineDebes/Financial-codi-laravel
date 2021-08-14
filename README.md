# Setup instructions

-   Write in the console " composer update ".
-   Go to PHPmyadmin and create a DATABASE with the name that you want.
-   In the shell write the following command " cp .env.example .env ."
-   In the .env file edit the Database username and password and database name to be able to modify the database.
-   Write in the shell " php artisan migrate ". ( This command create your database schema in the phpmyadmin).
-   Write in the shell " php artisan db:seed --class=ProductSeeder ."
