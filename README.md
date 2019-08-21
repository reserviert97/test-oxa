<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/reserviert97/test-oxa"></a>

  <h3 align="center">Simple Level and Badge System REST API</h3>

  <p align="center">
    <a href="https://oxalevelbadge.herokuapp.com/api/">Check out Deployed App </a> ||
    <a href="https://github.com/reserviert97/test-oxa/tree/master/screenshoot">View Screenshots </a>
  </p>
</p>

<!-- ABOUT THE PROJECT -->
## About The Project

Features:
* Create
* Read
* Update
* Delete
* Register
* Login

### Built With
* [Lumen](https://github.com/laravel/lumen)


<!-- GETTING STARTED -->
## Requirements
* PHP => 7.1x
* Postman => [Download](https://www.getpostman.com/downloads/)
* MYSQL / PostgreSQL Database

## Getting Started
* Clone this Repo
```bash
git clone https://github.com/reserviert97/test-oxa
```
* generate .env files
```bash
cp .env.example .env
```
* edit necessary configuration 
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= your database
DB_USERNAME= your database username
DB_PASSWORD= your database password
```
* start the server

```bash
php -S localhost:8000 -t public
```

### Register

* Url : /auth/register
* Method : POST

```json
{
	"email": "nurlatif@gmail.com",
	"password": "admin123",
	"name": "TNurlatif Ardhi Pratama"
}
```

### Login

* Url : /auth/login
* Method : POST

```json
{
	"email": "nurlatif@gmail.com",
	"password": "admin123"
}
```
then you will get token for access this entire REST API
(note) You need to provide Token in header with key Authorization and Bearer Value
[more detail](https://github.com/reserviert97/test-oxa/blob/master/screenshoot/1-token.png)

### Read All Level
* Url : /api/levels
* Method : GET

### Read Level By Id

* Url : /api/levels/{levelId}
* Method : GET

### Create Level

* Url : /api/levels
* Method : POST
* Body :

```json
{
	"level": 25,
	"minimum_generated": 30
}
```

### Update Level

* Url : /api/levels/{levelId}
* Method : PUT
* Body :

```json
{
	"level": 26,
	"minimum_generated": 29
}
```

### Delete Level

* Url : /api/levels/{levelId}
* Method : DELETE

### Read All Badges
* Url : /api/badges
* Method : GET

### Read Badge By Id

* Url : /api/badges/{badgeId}
* Method : GET

### Create Badge

* Url : /api/badges
* Method : POST
* Body :

```json
{
	"name": "Legendary",
	"description": "these person has strong ability in front of camera"
	"minimum_level" : 25
}
```

### Update Badge

* Url : /api/badges/{badgeId}
* Method : PUT
* Body :

```json
{
	"name": "Legendady",
	"description": "these person has strong ability in front of oppo camera"
	"minimum_level" : 24
}
```

### Delete Badges

* Url : /api/badges/{badgeId}
* Method : DELETE

### Read All Users

* Url : /api/users
* Method : GET

### Read Users By Id

* Url : /api/users/{userId}
* Method : GET

### Update Users

* Url : /api/badges/{badgeId}
* Method : PUT
* Body :

```json
{
	"name": "Ardhi Pratama",
	"email": "nurlatif97@outlook.com"
}
```

### Generate For increate Level and Badges

* Url : /api/generate
* Method : PUT


<!-- CONTACT -->
## Contributors

* Nurlatif Ardhi Pratama - [Github](https://github.com/reserviert97) - nurlatif97@outlook.com


