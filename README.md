# E-Perform App

A demo application to illustrate how E-Perform Admin works.

![E-Perform](https://e-perform.mcu.ac.th/img/demo.png)

## Installation

Clone the repo locally:

```sh
git clone https://github.com/baleethai/e-perform.git e-perform && cd e-perform
```

Install PHP dependencies:

```sh
composer install
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Generate storage link

```sh
php artisan storage:link
```

สร้างฐานข้อมูลชื่อว่า "e_perform"

Run database migrations:

```sh
php artisan migrate:fresh --seed && php artisan shield:install --fresh
```

สร้าง User

```sh
php artisan make:filament-user
```

-   **Username:** admin@admin.com
-   **Password:** 11111111