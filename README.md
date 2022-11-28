# **Laravel Mini POS**

Point of Sale refers to app by which owner can keep tracks of **payments**, **sales**, **stocks** etc.

## *What can do*

 - [x] Login with Admin Credentials
 - [x] Create and Delete Group for User management
 - [x] Add User based on Group
 - [x]  Edit and Delete User
 - [x] Create and Delete Category for Product management
 - [x] Add Product based on Category
 - [x] Edit and Delete Product
 - [x] Manage Product Stock
 - [x] Make new `sale` to user
 - [x] Make new `purchase` from user
 - [x] Make new `payment` for user
 - [x] Make new `receipt` for user
 - [x] Calculate `payments` `sales` `purchase` `balance` for user
 - [x] Monthly `sale` `purchase` `payment` `receipt` report

## Screenshots

![enter image description here](https://raw.githubusercontent.com/mhasanrabbi/images-repo/main/1.png?token=GHSAT0AAAAAABY6VCHARRWCSWHAD6QIVZC6Y4E5UVA)
![enter image description here](https://raw.githubusercontent.com/mhasanrabbi/images-repo/main/2.png?token=GHSAT0AAAAAABY6VCHBTK5KV4ALJHJEPHS2Y4E5WJQ)
![enter image description here](https://raw.githubusercontent.com/mhasanrabbi/images-repo/main/3.png?token=GHSAT0AAAAAABY6VCHBCGILSIJTKB4IFJUUY4E5W4A)
![enter image description here](https://raw.githubusercontent.com/mhasanrabbi/images-repo/main/7.png?token=GHSAT0AAAAAABY6VCHB4RJLMOAIDFQLT6X4Y4E5X7Q)
![enter image description here](https://raw.githubusercontent.com/mhasanrabbi/images-repo/main/9.png?token=GHSAT0AAAAAABY6VCHABRBK2XPQ65XD3FNAY4E5YTA)

## *Installation*


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
$ php artisan key:generate
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

### Login with Admin

By default app admin email `john@admin.com` and password is `password` 


