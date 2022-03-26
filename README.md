Fourth version of my FossilExchange webshop

# installation
<pre>
Follow these steps to get a working copy of this webshop project on your local computer: 
clone from this Github repository
then run:   composer install
            npm init
            npm install

create a .env file with all the contents of .env.example file
generate an app-key with command php artisan key:generate

make a new MySQL database on your local computer
make a user account for this laravel-webshop, grant all privileges and generate a password
save this new databasename, webshop username and password in the .env file

to fill database with dummy data, run commands:
        php artisan migrate:fresh
        php artisan db:seed

boot up a local server with command php artisan serve
</pre>