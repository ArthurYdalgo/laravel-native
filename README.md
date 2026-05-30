# Laravel 13 + NativePHP/Mobile Testing Repo

This repository is a test project so I can test [my fork version of NativePHP/Mobile](https://github.com/ArthurYdalgo/mobile-air), *which is version that is installed on the composer.json file*.


## Running the project

To run this project, follow these steps (after cloning the repository and copying the `.env.example` to `.env`):

1. Install dependencies:

```bash
composer install
npm install
php artisan key:generate
php artisan native:install

```

To build for ios

```bash
npm run build -- --mode=ios && php artisan native:run ios
```

for android

```bash
npm run build -- --mode=android && php artisan native:run android
```


