## Article Microservice API and UI Template

-   First, Clone this repository and composer install.

```
composer install
```

-   copy .env and generate key :

```
cp .env.example .env
php artisan key:generate
```

-   Edit file .env add some text in :

```
DB_DATABASE=article
```

-   Run a migrate, choose "yes" if you not to make database yet. after that run a seeder:

```
php artisan migrate
php artisan db:seed
```

-   Next, run project with :

```
php artisan serve --port=8000
```

-   If you want to check Collection of my [My Collection](https://documenter.getpostman.com/view/25782711/2s9YC31ti1).
-   All set, and access with your local url : [http://127.0.0.1:8000/post](http://127.0.0.1:8000/post).

I think that all result of my test for Fullstack development. Thank you :)
