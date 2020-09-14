# Auth

## POST /api/auth/register

### **Body request**

```json
{
    "fname": "Patricia",
    "lname": "Bruce",
    "email": "PatriciaABruce@rhyta.com",
    "password": "P@ssw0rd",
    "password_confirmation": "P@ssw0rd",
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

## POST /api/auth/login

### **Body request**

```json
{
    "email": "PatriciaABruce@rhyta.com",
    "password": "P@ssw0rd"
}
```

### **Response**

Résponse code : ```200 OK```

```json
{
    "acess_token": "the_token",
    "token_type": "Baerer",
    "expires_in": 3600
}
```

## POST /api/auth/refresh

### **Response**

Résponse code : ```200 OK```

```json
{
    "acess_token": "the_token",
    "token_type": "Baerer",
    "expires_in": 3600
}
```

## POST /api/auth/logout

### **Response**

Résponse code : ```204 No Content```

## GET /api/auth/profile

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
    }
}
```