# Books

## GET /api/users

### **Response**

Résponse code : ```200 OK```

```json
{
    "data": [
    {
        "id": 1,
        "fname": "Patricia",
        "lname": "Bruce",
        "email": "PatriciaABruce@rhyta.com",
        "address": "2035 Oakwood Circle",
        "postalcode": "92501",
        "city": "Riverside",
        "_links": {
            "self": {
                "href": "/api/users/1"
            },
            "modify": {
                "href": "/api/users/1"
            },
            "delete": {
                "href": "/api/users/1"
            }
        },
        "_embedded": {
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
## GET /api/users/{id}

### **Response**

Résponse code : ```200 OK```

```json
{
    "id": 1,
    "fname": "Patricia",
    "lname": "Bruce",
    "email": "PatriciaABruce@rhyta.com",
    "address": "2035 Oakwood Circle",
    "postalcode": "92501",
    "city": "Riverside",
    "_links": {
        "self": {
            "href": "/api/users/1"
        },
        "modify": {
            "href": "/api/users/1"
        },
        "delete": {
            "href": "/api/users/1"
        }
    },
    "_embedded": {
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
    "id": 1,
    "fname": "Patricia",
    "lname": "Bruce",
    "email": "PatriciaABruce@rhyta.com",
    "password": "P@ssw0rd",
    "address": "2035 Oakwood Circle",
    "postalcode": "92501",
    "city": "Riverside"
}
```

### **Response**

Résponse code : ```201 Created```

```json
{
    "id": 1,
    "fname": "Patricia",
    "lname": "Bruce",
    "email": "PatriciaABruce@rhyta.com",
    "address": "2035 Oakwood Circle",
    "postalcode": "92501",
    "city": "Riverside",
    "_links": {
        "self": {
            "href": "/api/users/1"
        },
        "modify": {
            "href": "/api/users/1"
        },
        "delete": {
            "href": "/api/users/1"
        }
    }
}
```
---
## PUT /api/users/{id}

This route need to be authenticated and to be admin.

### **Body request**

```json
{
    "id": 1,
    "fname": "Patricia",
    "lname": "Bruce",
    "email": "PatriciaABruce@rhyta.com",
    "password": "P@ssw0rd",
    "address": "2035 Oakwood Circle",
    "postalcode": "92501",
    "city": "Riverside"
}
```

### **Response**

Résponse code : ```201 Created```

```json
{
    "id": 1,
    "fname": "Patricia",
    "lname": "Bruce",
    "email": "PatriciaABruce@rhyta.com",
    "address": "2035 Oakwood Circle",
    "postalcode": "92501",
    "city": "Riverside",
    "_links": {
        "self": {
            "href": "/api/users/1"
        },
        "modify": {
            "href": "/api/users/1"
        },
        "delete": {
            "href": "/api/users/1"
        }
    }
}
```
---
## DELETE /api/users/{id}

This route need to be authenticated and to be admin.

### **Response**

Résponse code : ```204 No Content```