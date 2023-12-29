@ehco off

@REM name: build repository
@REM description: build repository
@REM author: 3B032110
@REM date: 2023/12/29
@REM version: 1.0.0

ehco "build repository"
copy .env.example .env /y
composer install && php artisan key:generate && npm i && npm run build && php artisan migrate && php artisan db:seed
