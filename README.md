# Laravel Sample Ecommerce
This is a sample code to get started with ecommerce using laravel framework
It contains users, vendors, categories, products, and cart operations.

<p align="center"><a href="#" target="_blank"><img src="https://github.com/teddywafula/laravelEcommerce/raw/master/apis.png" width="400" alt="Apis"></a></p>

# Getting started
- Copy .env.example to .env
- Update database settings
- Run php artisan migrate to create database tables
- Run php artisan db:seed to seed Users to db
- <a href="https://github.com/teddywafula/laravelEcommerce/blob/master/LaravelEcom.postman_collection.json">Open the collection, adjust base url and run apis </a>
- In .env add L5_SWAGGER_CONST_HOST= to your host ip. i.e L5_SWAGGER_CONST_HOST=http://127.0.0.1:8000
- Run php artisan l5-swagger:generate to generate api documentation
- Open swagger documentation at url you configured at L5_SWAGGER_CONST_HOST/api/documentation
i.e =http://127.0.0.1:8000/api/documentation
