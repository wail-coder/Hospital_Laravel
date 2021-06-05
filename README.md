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

Steps:<br />
1- download the code from github<br />

2- follow these steps (if first time):

```sh
cd HospitalsSystem
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed

```

3- follow these steps (if there is previous tags existing):
<br />

```sh
cd HospitalsSystem
php artisan key:generate
php artisan migrate:fresh
php artisan db:seed
```
