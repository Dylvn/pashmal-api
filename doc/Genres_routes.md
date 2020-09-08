# Genres

## GET /api/genres

### **Response**

Résponse code : ```200 OK```

```json
{
    "data": [
    {
        "id": 1,
        "name": "Fiction",
        "_links": {
            "self": {
                "href": "/api/genres/1"
            },
            "modify": {
                "href": "/api/genres/1"
            },
            "delete": {
                "href": "/api/genres/1"
            }
        },
        "_embedded": {
            "books": [
                "/api/books/1",
                "/api/books/54"
            ]
        }
    }
    ]
}
```
---
## GET /api/genres/{id}

### **Response**

Résponse code : ```200 OK```

```json
{
        "id": 1,
        "name": "Fiction",
        "_links": {
            "self": {
                "href": "/api/genres/1"
            },
            "modify": {
                "href": "/api/genres/1"
            },
            "delete": {
                "href": "/api/genres/1"
            }
        },
        "_embedded": {
            "books": [
                "/api/books/1",
                "/api/books/54"
            ]
        }
    }
```
---
## POST /api/genres

This route need to be authenticated and to be admin.

### **Body request**

```json
{
    "name": "Aventure"
}
```

### **Response**

Résponse code : ```201 Created```

```json
{   
    "id": 2,
    "name": "Aventure",
    "_links": {
        "self": {
            "href": "/api/genres/2"
        },
        "modify": {
            "href": "/api/genres/2"
        },
        "delete": {
            "href": "/api/genres/2"
        }
    }
}
```
---
## PUT /api/genres/{id}

This route need to be authenticated and to be admin.

### **Body request**

```json
{
    "name": "Science-fiction"
}
```

### **Response**

Résponse code : ```201 Created```

```json
{
        "id": 1,
        "name": "Science-fiction",
        "_links": {
            "self": {
                "href": "/api/genres/1"
            },
            "modify": {
                "href": "/api/genres/1"
            },
            "delete": {
                "href": "/api/genres/1"
            }
        },
        "_embedded": {
            "books": [
                "/api/books/1",
                "/api/books/54"
            ]
        }
    }
```
---
## DELETE /api/genres/{id}

This route need to be authenticated and to be admin.

### **Response**

Résponse code : ```204 No Content```