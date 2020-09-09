# Books

## GET /api/orders

### **Response**

Résponse code : ```200 OK```

```json
{
    "data": [
    {
        "id": 1,
        "billing_address": "Strepestraat 416",
        "billing_postalcode": "13100",
        "billing_city": "La Hulpe",
        "delivery_address": "Strepestraat 416",
        "delivery_postalcode": "13100",
        "delivery_city": "La Hulpe",
        "ttc_price": 10,
        "ht_price": 10.20,
        "user_id": 12,
        "_links": {
            "self": {
                "href": "/api/orders/1"
            },
            "modify": {
                "href": "/api/orders/1"
            },
            "delete": {
                "href": "/api/orders/1"
            }
        },
        "_embedded": {
            "books": [
                "/api/books/1",
                "/api/books/54"
            ],
            "user": "/api/users/12"
        }
    }
    ]
}
```
---
## GET /api/orders/{id}

### **Response**

Résponse code : ```200 OK```

```json
{
    "id": 1,
    "billing_address": "Strepestraat 416",
    "billing_postalcode": "13100",
    "billing_city": "La Hulpe",
    "delivery_address": "Strepestraat 416",
    "delivery_postalcode": "13100",
    "delivery_city": "La Hulpe",
    "ttc_price": 10,
    "ht_price": 10.20,
    "user_id": 12,
    "_links": {
        "self": {
            "href": "/api/orders/1"
        },
        "modify": {
            "href": "/api/orders/1"
        },
        "delete": {
            "href": "/api/orders/1"
        }
    },
    "_embedded": {
        "books": [
            "/api/books/1",
            "/api/books/54"
        ],
        "user": "/api/users/12"
    }
}
```
---
## POST /api/orders

This route need to be authenticated and to be admin.

### **Body request**

```json
{
    "id": 1,
    "billing_address": "Strepestraat 416",
    "billing_postalcode": "13100",
    "billing_city": "La Hulpe",
    "delivery_address": "Strepestraat 416",
    "delivery_postalcode": "13100",
    "delivery_city": "La Hulpe",
    "user_id": 12,
    "books": [
        11, 15
    ]
}
```

### **Response**

Résponse code : ```201 Created```

```json
{
    "id": 1,
    "billing_address": "Strepestraat 416",
    "billing_postalcode": "13100",
    "billing_city": "La Hulpe",
    "delivery_address": "Strepestraat 416",
    "delivery_postalcode": "13100",
    "delivery_city": "La Hulpe",
    "ttc_price": 10,
    "ht_price": 10.20,
    "user_id": 12,
    "_links": {
        "self": {
            "href": "/api/orders/1"
        },
        "modify": {
            "href": "/api/orders/1"
        },
        "delete": {
            "href": "/api/orders/1"
        }
    },
    "_embedded": {
        "books": [
            "/api/books/11",
            "/api/books/15"
        ],
        "user": "/api/users/12"
    }
}
```
---
## PUT /api/books/{id}

This route need to be authenticated and to be admin.

### **Body request**

```json
{
    "id": 1,
    "billing_address": "Strepestraat 416",
    "billing_postalcode": "13100",
    "billing_city": "La Hulpe",
    "delivery_address": "Strepestraat 416",
    "delivery_postalcode": "13100",
    "delivery_city": "La Hulpe",
    "books": [
        11, 15
    ]
}
```

### **Response**

Résponse code : ```201 Created```

```json
{
    "id": 1,
    "billing_address": "Strepestraat 416",
    "billing_postalcode": "13100",
    "billing_city": "La Hulpe",
    "delivery_address": "Strepestraat 416",
    "delivery_postalcode": "13100",
    "delivery_city": "La Hulpe",
    "ttc_price": 10,
    "ht_price": 10.20,
    "user_id": 12,
    "_links": {
        "self": {
            "href": "/api/orders/1"
        },
        "modify": {
            "href": "/api/orders/1"
        },
        "delete": {
            "href": "/api/orders/1"
        }
    },
    "_embedded": {
        "books": [
            "/api/books/11",
            "/api/books/15"
        ],
        "user": "/api/users/12"
    }
}
```
---
## DELETE /api/books/{id}

This route need to be authenticated and to be admin.

### **Response**

Résponse code : ```204 No Content```