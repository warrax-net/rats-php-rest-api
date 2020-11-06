# rats-php-rest-api
PHP REST API for Warrax BFP Rats project.
PHP 7 & MySQL REST API. CRUD (Create, Read, Update, Delete) RESTful API with MySQL database.

## PHP CRUD API
### RATS endpoint
* `GET - http://{SERVER_URL}/api/rat/read.php` Fetch ALL Records
* `GET - http://{SERVER_URL}/api/rat/single_read.php/?id=2` Fetch Single Record
* `POST - http://{SERVER_URL}/api/rat/create.php` Create Record
* `POST - http://{SERVER_URL}/api/rat/update.php` Update Record
* `DELETE - http://{SERVER_URL}/api/rat/delete.php` Remove Records

### PHOTOS endpoint
* `GET - http://{SERVER_URL}/api/photo/read.php` Fetch ALL Records
* `GET - http://{SERVER_URL}/api/photo/single_read.php/?id=2` Fetch Single Record
* `POST - http://{SERVER_URL}/api/photo/create.php` Create Record
* `POST - http://{SERVER_URL}/api/photo/update.php` Update Record
* `DELETE - http://{SERVER_URL}/api/photo/delete.php` Remove Records
