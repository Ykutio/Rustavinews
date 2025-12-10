This application works that:

1.First step:

    git clone https://github.com/Ykutio/Rustavinews.git

2.Second step:

    composer install

3.Third step:

    create ".env" file from ".env.example" file

4.Fourth step:

    add params to ".env"
    
    DB_CONNECTION=mysql
    DB_HOST='MySQL-8.2'
    DB_PORT=3306
    DB_DATABASE=rustavinews
    DB_USERNAME=root
    DB_PASSWORD=

5.Fifth step:

    php artisan key:generate
