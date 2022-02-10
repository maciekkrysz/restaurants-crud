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

# Run docker
1. Copy .env.example to .env
2. Create new key:
`php artisan key:generate --show`
3. Fill APP_KEY, DB_PASSWORD, DB_ROOT_PASSWORD
4. Run docker-compose:
`docker-compose up --build`
