# first time
docker compose up -d --build
docker exec -it laravel-app composer install
docker exec -it laravel-app php artisan key:generate

# configura env

# migrations
docker exec -it laravel-app php artisan migrate
## dai roda