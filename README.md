<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Techome

The web-based e-commerce store, TECHOME provides maximum functionalities of shopping on an online platform. Now a days, people want to get everything online in order to save the time and hassle of going to a specific shop to buy the required products. With that in mind, I am developing the online Shopping Application that will allow the user to purchase the desired products on an online platform. Using this online platform, the user can also keep track of the orders he has booked and can also view and edit his profile as he desires.

## Getting started

Assuming you've already installed on your machine: PHP (>= 7.0.0), [Laravel](https://laravel.com), [Composer](https://getcomposer.org) and [Node.js](https://nodejs.org).

``` bash
# install dependencies
composer install
npm install

# create .env file and generate the application key
cp .env.example .env
php artisan key:generate

#create databse with following configuration
host: 127.0.0.1 (localhost)
database: techome_pak
username: root
password: (no password)

# Generate tables in database
php artisan migrate

# build CSS and JS assets
npm run dev
# or, if you prefer minified files
npm run prod
```

Then launch the server:

``` bash
php artisan serve
```

The Techome project is now up and running! Access it at http://localhost:8000.

## Licence


Licensed under the Apache License, Version 2.0 (the "License"); you may not use this project except in compliance with the License. You may obtain a copy of the License at http://www.apache.org/licenses/LICENSE-2.0.

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.



