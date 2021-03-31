# HospitalsSystem


HospitalsSystem is a Emergency System for a hospital.


## Features

- One
- Two
- Three

## Installation

HospitalsSystem requires 
- [Xampp](https://www.apachefriends.org/index.html).
- [composer](https://getcomposer.org/).
- [Node.js](https://nodejs.org/).

steps:
1- download the code from github
2- follow these steps:

```sh
cd HospitalsSystem
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed

```
