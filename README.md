## Install
1. xampp terbaru
2. composser
3. install git

jalankan xampp, centang `apache` dan `mysql`
## 01 Download source code dari Bitbucket
buka cmd dan ke working directory kita, ketikkan command berikut :
```
git clone --depth 1 https://github.com/adhawandiy99/nte.git
```

## 02 Download Library
masuk ke folder aplikasi

```
cd nte
```

install library untuk PHP
```
composer install
```

## 03 Setting Aplikasi
masuk dalam database kita bikin 1 database dengan nama `nte`, kembali ke cmd dan ketikkan command berikut:
```
copy .env.example .env
```
buka file `.env`, edit DB_USERNAME dan DB_PASSWORD sesuaikan dengan akun login phpmyadmin agar web kita bisa akses database, setelah seselai setting koneksi, ketikkan command di bawah ini:

```
php artisan key:generate
```

## 04 import plugin telegram bot
ketikkan command berikut:
```
composer require irazasyed/telegram-bot-sdk
php artisan vendor:publish
```
pilih package telegram bot.

Step 1: Add the Service Provider
Open config/app.php and, to your providers array at the bottom, add:
```
Telegram\Bot\Laravel\TelegramServiceProvider::class
```
Step 2: Add Facade (Optional)
Optionally add an alias to make it easier to use the library. Open config/app.php and, to your "aliases" array at the bottom, add:
```
'Telegram'  => Telegram\Bot\Laravel\Facades\Telegram::class
```

## 04 Menjalankan Aplikasi
ketikkan command ini:
```
php artisan serve

```

buka browser ketik `localhost:8000`
