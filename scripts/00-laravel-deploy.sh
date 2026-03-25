#!/usr/bin/env bash
echo "Menjalankan Composer..."
composer install --no-dev --working-dir=/var/www/html

echo "Membersihkan Cache..."
php artisan optimize:clear

echo "Menjalankan Migrasi Database..."
php artisan migrate --force

echo "Selesai!"