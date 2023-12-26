@echo off
echo init install repo
composer install
copy .\.env.example .\.env
php artisan key:generate
npm i
npm run build
exit