# rats-php-rest-api
PHP REST API for Warrax BFP Rats project.

PHP 7 & MySQL REST API. CRUD (Create, Read, Update, Delete) RESTful API with MySQL database.

## PHP CRUD API
### RATS endpoint
* `GET - http://{SERVER_URL}/api/rat/read.php` Fetch ALL Records

Sample response:
```
{
  "body": [
    {
      "id": "1",
      "name": "\u041e\u0434\u0438\u043d",
      "color": "Blue Berkshire Standard",
      "birth_date_d": null,
      "birth_date_m": "11",
      "birth_date_y": "2002",
      "death_date_d": "23",
      "death_date_m": "2",
      "death_date_y": "2005",
      "is_alive": "0",
      "death_reason": "\u0421\u0442\u0430\u0440\u043e\u0441\u0442\u044c",
      "arrival_date_d": null,
      "arrival_date_m": "6",
      "arrival_date_y": "2003",
      "description": "\u041e\u0434\u0438\u043d \u043e\u043f\u0438\u0441\u0430\u043d\u0438\u0435",
      "created": "2020-11-06 23:17:07"
    }
  ],
  "itemCount": 1
}
```

* `GET - http://{SERVER_URL}/api/rat/single_read.php/?id=2` Fetch Single Record

Sample response:
```
{
  "id": "1",
  "name": "\u041e\u0434\u0438\u043d",
  "color": "Blue Berkshire Standard",
  "birth_date_d": null,
  "birth_date_m": "11",
  "birth_date_y": "2002",
  "death_date_d": "23",
  "death_date_m": "2",
  "death_date_y": "2005",
  "is_alive": "0",
  "death_reason": "\u0421\u0442\u0430\u0440\u043e\u0441\u0442\u044c",
  "arrival_date_d": null,
  "arrival_date_m": "6",
  "arrival_date_y": "2003",
  "description": "\u041e\u0434\u0438\u043d \u043e\u043f\u0438\u0441\u0430\u043d\u0438\u0435",
  "created": "2020-11-06 23:17:07"
}
```

* `POST - http://{SERVER_URL}/api/rat/create.php` Create Record

Sample request:

```
{
  "name": "Стасик Полоскин",
  "color": "Blue Agouti Hooded Standart",
  "birth_date_d": -1,
  "birth_date_m": "12",
  "birth_date_y": "2003",
  "death_date_d": "15",
  "death_date_m": "4",
  "death_date_y": "2005",
  "is_alive": "0",
  "death_reason": ":(",
  "arrival_date_d": 30,
  "arrival_date_m": "8",
  "arrival_date_y": "2003",
  "description": "\u041e\u0434\u0438\u043d \u043e\u043f\u0438\u0441\u0430\u043d\u0438\u0435",
  "created": "2020-11-06 23:17:07"
}
```

Success response:

```
Rat created successfully.
```

Error response:

```
array(3) {
  [0]=>
  string(5) "HY000"
  [1]=>
  int(1366)
  [2]=>
  string(62) "Incorrect integer value: '' for column 'birth_date_d' at row 1"
}
```

* `POST - http://{SERVER_URL}/api/rat/update.php` Update Record
* `DELETE - http://{SERVER_URL}/api/rat/delete.php` Remove Records

Sample request:

```
{
    id: 1
}
```

Success response:

```
Rat deleted.
```

### PHOTOS endpoint
* `GET - http://{SERVER_URL}/api/photo/read.php` Fetch ALL Records
* `GET - http://{SERVER_URL}/api/photo/single_read.php/?id=2` Fetch Single Record
* `POST - http://{SERVER_URL}/api/photo/create.php` Create Record
* `POST - http://{SERVER_URL}/api/photo/update.php` Update Record
* `DELETE - http://{SERVER_URL}/api/photo/delete.php` Remove Records
