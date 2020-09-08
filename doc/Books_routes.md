# Books

## GET /api/books

### **Response**

Résponse code : ```200 OK```

```json
{
    "data": [
    {
        "id": 1,
        "name": "Harry Potter à l'école des sorciers",
        "author": "J. K. Rowling",
        "description": "Après la mort de ses parents (Lily et James Potter), Harry Potter est recueilli par sa tante maternelle Pétunia et son oncle Vernon à l'âge d'un an.",
        "price": 19.99,
        "available": true,
        "created_at": "1997-06-26",
        "_links": {
            "self": {
                "href": "/api/books/1"
            },
            "modify": {
                "href": "/api/books/1"
            },
            "delete": {
                "href": "/api/books/1"
            }
        },
        "_embedded": {
            "genres": [
                "/api/genres/1",
                "/api/genres/54"
            ],
            "orders": [
                "/api/order/4",
                "/api/order/16"
            ]
        }
    }
    ]
}
```
---
## GET /api/books/{id}

### **Response**

Résponse code : ```200 OK```

```json
{
    "id": 1,
    "name": "Harry Potter à l'école des sorciers",
    "author": "J. K. Rowling",
    "description": "Après la mort de ses parents (Lily et James Potter), Harry Potter est recueilli par sa tante maternelle Pétunia et son oncle Vernon à l'âge d'un an.",
    "price": 19.99,
    "available": true,
    "created_at": "1997-06-26",
    "_links": {
        "self": {
            "href": "/api/books/1"
        },
        "modify": {
            "href": "/api/books/1"
        },
        "delete": {
            "href": "/api/books/1"
        }
    },
    "_embedded": {
        "genres": [
            "/api/genres/1",
            "/api/genres/54"
        ],
        "orders": [
            "/api/order/4",
            "/api/order/16"
        ]
    }
}
```
---
## POST /api/books

This route need to be authenticated and to be admin.

### **Body request**

```json
{
    "name": "L'Éveil du Léviathan",
    "author": "James S. A. Corey",
    "description": "Dans un futur non daté, le système solaire a été colonisé par l'humanité. La Ceinture d'astéroïdes compte de nombreuses stations minières, dédiées à l'extraction des minerais nécessaires à l'industrie de l'ensemble du système solaire, en particulier pour les deux grandes puissances, Mars et la Terre.",
    "price": 14.99,
    "available": true,
    "created_at": "2011-06-15",
    "genres": [
        1, 56
    ]
}
```

### **Response**

Résponse code : ```201 Created```

```json
{   
    "id": 2,
    "name": "L'Éveil du Léviathan",
    "author": "James S. A. Corey",
    "description": "Dans un futur non daté, le système solaire a été colonisé par l'humanité. La Ceinture d'astéroïdes compte de nombreuses stations minières, dédiées à l'extraction des minerais nécessaires à l'industrie de l'ensemble du système solaire, en particulier pour les deux grandes puissances, Mars et la Terre.",
    "price": 14.99,
    "available": true,
    "created_at": "2011-06-15",
    "_links": {
        "self": {
            "href": "/api/books/2"
        },
        "modify": {
            "href": "/api/books/2"
        },
        "delete": {
            "href": "/api/books/2"
        }
    },
    "_embedded": {
        "genres": [
            "/api/genres/1",
            "/api/genres/56"
        ],
    }
}
```
---
## PUT /api/books/{id}

This route need to be authenticated and to be admin.

### **Body request**

```json
{
    "name": "L'Éveil du Léviathan",
    "author": "James S. A. Corey",
    "description": "Dans un futur non daté, le système solaire a été colonisé par l'humanité. La Ceinture d'astéroïdes compte de nombreuses stations minières, dédiées à l'extraction des minerais nécessaires à l'industrie de l'ensemble du système solaire, en particulier pour les deux grandes puissances, Mars et la Terre.",
    "price": 14.99,
    "available": true,
    "created_at": "2011-06-15",
    "genres": [
        1, 56
    ]
}
```

### **Response**

Résponse code : ```201 Created```

```json
{   
    "id": 2,
    "name": "L'Éveil du Léviathan",
    "author": "James S. A. Corey",
    "description": "Dans un futur non daté, le système solaire a été colonisé par l'humanité. La Ceinture d'astéroïdes compte de nombreuses stations minières, dédiées à l'extraction des minerais nécessaires à l'industrie de l'ensemble du système solaire, en particulier pour les deux grandes puissances, Mars et la Terre.",
    "price": 14.99,
    "available": true,
    "created_at": "2011-06-15",
    "_links": {
        "self": {
            "href": "/api/books/2"
        },
        "modify": {
            "href": "/api/books/2"
        },
        "delete": {
            "href": "/api/books/2"
        }
    },
    "_embedded": {
        "genres": [
            "/api/genres/1",
            "/api/genres/56"
        ],
        "orders": [ 
            "/api/orders/34",
            "/api/orders/234"
        ]
    }
}
```
---
## DELETE /api/books/{id}

This route need to be authenticated and to be admin.

### **Response**

Résponse code : ```204 No Content```