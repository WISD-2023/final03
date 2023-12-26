@echo off
echo init install repo
composer install
cp .\.env.example .env
php artisan key:generate
npm i