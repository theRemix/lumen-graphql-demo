# Lumen GraphQL Demo

- laravel
- lumen
- graphql

# Tutorial

## Install Dependencies

```sh
composer global require "laravel/lumen-installer"
```

## Run a database with sample data

using `dellstore` sample data

```
docker run -d --name pg-ds-dellstore -p 5430:5432 aa8y/postgres-dataset:dellstore
```

## Create Demo Project

_otherwise, just clone this demo_

```sh
~/.composer/vendor/bin/lumen new demo
cd demo
```

### Get Eloquence extensions

```sh
composer require sofa/eloquence
```

### App config

```sh
cp .env.example .env
```

update db connection in `.env`

```env
...
DB_CONNECTION=postgresql
DB_HOST=127.0.0.1
DB_PORT=5430
DB_DATABASE=dellstore
DB_USERNAME=docker
DB_PASSWORD=docker
...
```


### Add GraphQL library

```sh
composer require folklore/graphql
```

Load the service provider and enable facades in `bootstrap/app.php`

uncomment
```php
$app->withFacades();
```

add
```php
$app->register(Folklore\GraphQL\LumenServiceProvider::class);
```


publish the config

```sh
php artisan graphql:publish
```

Load configuration file in `bootstrap/app.php`

_this command needs to be executed before the registration of the service provider_

```php
$app->configure('graphql');
...
$app->register(Folklore\GraphQL\LumenServiceProvider::class)
```

# Define Schemas

edit `config/graphql.php` to add schemas using the GraphQL facade, see `config/graphql.php`




## Run the project

### Using php built in server

```sh
php -S localhost:8000 -t public
```
