# Challenge Aaxis
# Symfony 7

### Environment
Commands
```shell
1) composer install
2) php bin/console doctrine:database:create
3) php bin/console doctrine:migrations:migrate
4) php bin/console doctrine:fixtures:load
```
### API
Commands
```shell
1) POST - /api/auth/login
Api login to the app

Request: 
{
    "username": "aaxis",
    "password": "test"
}
