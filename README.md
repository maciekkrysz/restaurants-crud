# restaurants-crud
## CRUD
restaurants, clients, orders

## Technology
+ PHP,
+ Lavarel,
+ Docker,
+ https://github.com/DarkaOnLine/L5-Swagger

## Optional
- [ ] Payments by stripe

## Run docker
1. Copy .env.example to .env
2. Create new key:
`php artisan key:generate --show`
3. Fill APP_KEY, DB_PASSWORD, DB_ROOT_PASSWORD
4. Run docker-compose:
`docker-compose up --build`
5. Do migrations:
`docker-compose exec laravel php artisan migrate`
6. Seed database:
`docker-compose exec laravel php artisan db:seed`  
   or reseed:
`docker-compose exec laravel php artisan migrate:fresh --seed`
7. Run server:
`docker-compose exec laravel php artisan serve --host=0.0.0.0`

### In case of slowly docker container (Windows)
Disable "Use the WSL 2 based engine" option in Docker Desktop

## Publish l5-swagger
`php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"`  
`php artisan l5-swagger:generate`  
documentation available on /api/documentation