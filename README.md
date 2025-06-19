Projet standard laravel.

Mise en place : 

copier .env.example en .env
modifier les valeurs de config BDD dedans

composer install
npm install
npm run build
php artisan key:generate
php artisan migrate:fresh --seed
