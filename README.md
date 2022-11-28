# Laravel Mini POS

Point of Sale refers to app by which owner can keep tracks of **payments**, **sales**, **stocks** etc.


# Installation


### Clone the repository:
``` 
$ git clone https://github.com/mhasanrabbi/laravel-mini-pos.git
```

### Change Directory

```
$ cd laravel-mini-pos
```
### Install Composer
``` 
$ composer install
```
### Generate APP_KEY 
``` 
$ composer artisan key:generate
```

### Change below credentials with your own config in `.env`
``` 
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

### Run Database Migration

``` 
$ php artisan migrate
```

### Start Local Development Server

``` 
$ php artisan serve
```

