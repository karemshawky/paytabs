# CodeIgniter 4 Application

## How to install the project?

## Requirement

PHP version 7.3 or 8.0.

## Installation

```
git clone git@github.com:karemshawky/paytabs.git
composer install
cp env .env

```
### In `.env` file **uncomment** some config values:

- `CI_ENVIRONMENT`
- `app.baseURL` and add your base URL
- add `app.indexPage = ''`
- database section the part start with `database.default` and add your config


### Run some commands

```
php spark key:generate
php spark migrate
php spark db:seed  with file name [ CategoriesSeeder ]

```

After that go to this route to add categories:

http://YOUR_BASE_URL.test/categories/new