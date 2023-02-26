# First run
install dependencies for back and front
Run mirgration and seeders
```bash
composer install
npm install

// DB up + seeded
php artisan migrate --seed 

// DB down, DB up + seeded
php artisan migrate:refresh --seed 


// seeders location > database/seeders
// DB seed --class DatabaseSeader
php artisan db:seed

// php artisan db:seed --class [ClassSeader]
php artisan db:seed --class CustomCheckInsSeeder
```


# Work

Run back
```bash
php artisan serve
```

Run front

```bash
npm run build
```


# Credentials

**Login**: admin@gmail.com \
**Password**: 12345678


