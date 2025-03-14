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

สร้างฐานข้อมูลชื่อว่า "e_perform"

Run database migrations:

```sh
php artisan migrate:fresh --seed && php artisan shield:install --fresh
```

You're ready to go! Visit the url in your browser, and login with:

-   **Username:** admin@admin.com
-   **Password:** 11111111

## Features to explore

### Relations

#### BelongsTo
- ProductResource
- OrderResource
- PostResource

#### BelongsToMany
- CategoryResource\RelationManagers\ProductsRelationManager

#### HasMany
- OrderResource\RelationManagers\PaymentsRelationManager

#### HasManyThrough
- CustomerResource\RelationManagers\PaymentsRelationManager

#### MorphOne
- OrderResource -> Address

#### MorphMany
- ProductResource\RelationManagers\CommentsRelationManager
- PostResource\RelationManagers\CommentsRelationManager

#### MorphToMany
- BrandResource\RelationManagers\AddressRelationManager
- CustomerResource\RelationManagers\AddressRelationManager
