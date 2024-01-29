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
1) Login: POST - /api/auth/login

- Request: 
{
    "username": "aaxis",
    "password": "test"
}

- Response: 
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE3MDY0OTc0MzQsImV4cCI6MTcwNjUwMTAzNCwicm9sZXMiOlsiUk9MRV9VU0VSIl0sInVzZXJuYW1lIjoiYWF4aXMifQ.Do7zcYn8xrHh116iNkvq6IZ0sK71i0AueNE4gOaA3S0UbwKliMSsAvF_GfJliiu7_5FdUZ4RNGV0xiRIRCbcNA6hCQ0_dg-gzhn7DjpVCPB9IZliO7nXwNjA4UErdX6-hPQzflS4GjNmfPuxT1hNbLzs3sPLoFDZ3UOffdtygX77ZSDY-v6vCekobXOdGs1iWgNreO58NNXG65Zi7yE_SeMA7kS4BWBaJ0eRx3nRv-K05NBVfLwCV1tcojNXKe_PNmU30fQGd1Lg06u5CBonqpA5vAiTjO4_P1Pc9njkHxdQn9SuF0exzxhy3L7bU5RwypkMppXVPi2IiBjOdcD2wA"
}

2) Products list - GET - /api/products

- Header: Authorization: Bearer {{ token }}

- Response: 
{
    "products": [
        {
            "sku": "0013",
            "name": "name 13",
            "description": "hola 13 desc",
            "createdAt": "2024-01-28T22:06:29+00:00",
            "updatedAt": "2024-01-28T22:06:29+00:00"
        },
        {
            "sku": "0011",
            "name": "name 11 modi",
            "description": "hola 11 desc modi",
            "createdAt": "2024-01-28T22:06:29+00:00",
            "updatedAt": "2024-01-28T22:11:15+00:00"
        },
        {
            "sku": "0012",
            "name": "modificado",
            "description": "modificado",
            "createdAt": "2024-01-28T22:06:29+00:00",
            "updatedAt": "2024-01-28T22:29:23+00:00"
        }
    ]
}

3) Create Products - POST - /api/products

- Header: Authorization: Bearer {{ token }}

- Request: 
[
    {
        "sku": "0020",
        "name": "name 20",    
        "description": "hola 20 desc"
    },
    {
        "sku": "0021",
        "name": "name 21",    
        "description": "hola 21 desc"
    },
    {
        "sku": "0022",
        "name": "name 22",    
        "description": "hola 22 desc"
    }
]

- Response: 
{
    "status": "ok",
    "statusCode": 200,
    "message": "The products have been inserted correctly.",
    "products": [
        {
            "sku": "0020",
            "name": "name 20",
            "description": "hola 20 desc",
            "createdAt": null,
            "updatedAt": null
        },
        {
            "sku": "0021",
            "name": "name 21",
            "description": "hola 21 desc",
            "createdAt": null,
            "updatedAt": null
        },
        {
            "sku": "0022",
            "name": "name 22",
            "description": "hola 22 desc",
            "createdAt": null,
            "updatedAt": null
        }
    ]
}

4) Update Products - PUT - /api/products

- Header: Authorization: Bearer {{ token }}

- Response: 
[
    {
        "sku": "0020",
        "name": "name 20 updated",
        "description": "hola 20 desc updated"
    },
    {
        "sku": "0021",
        "name": "name 21 updated",
        "description": "hola 21 desc updated",
        "createdAt": null,
        "updatedAt": null
    }
]

- Response: 
{
    "status": "ok",
    "statusCode": 200,
    "message": "The products have been updated correctly.",
    "products": [
        {
            "sku": "0020",
            "name": "name 20 updated",
            "description": "hola 20 desc updated",
            "createdAt": {
                "date": "2024-01-29 03:11:41.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updatedAt": {
                "date": "2024-01-29 03:11:41.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "sku": "0021",
            "name": "name 21 updated",
            "description": "hola 21 desc updated",
            "createdAt": {
                "date": "2024-01-29 03:11:41.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updatedAt": {
                "date": "2024-01-29 03:11:41.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        }
    ]
}