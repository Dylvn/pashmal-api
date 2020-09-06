# Genres

## GET /genres

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
                "href": "/genres/1"
            },
            "modify": {
                "href": "/genres/1"
            },
            "delete": {
                "href": "/genres/1"
            }
        },
        "_embedded": {
            "books": [
                "/books/1",
                "/books/54"
            ]
        }
    }
    ]
}
```
---
## GET /genres/{id}

### **Response**

Résponse code : ```200 OK```

```json
{
        "id": 1,
        "name": "Fiction",
        "_links": {
            "self": {
                "href": "/genres/1"
            },
            "modify": {
                "href": "/genres/1"
            },
            "delete": {
                "href": "/genres/1"
            }
        },
        "_embedded": {
            "books": [
                "/books/1",
                "/books/54"
            ]
        }
    }
```
---
## POST /genres

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
            "href": "/genres/2"
        },
        "modify": {
            "href": "/genres/2"
        },
        "delete": {
            "href": "/genres/2"
        }
    }
}
```
---
## PUT /genres/{id}

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
                "href": "/genres/1"
            },
            "modify": {
                "href": "/genres/1"
            },
            "delete": {
                "href": "/genres/1"
            }
        },
        "_embedded": {
            "books": [
                "/books/1",
                "/books/54"
            ]
        }
    }
```
---
## DELETE /genres/{id}

This route need to be authenticated and to be admin.

### **Response**

Résponse code : ```204 No Content```