# algeria-cities-api

algeria-cities-api is an API allowing you to retrieve multiple information about the cities and regions of Algeria.

This application is based on Slim version 4 framework.

# Steps :

```
git clone https://github.com/Astero-H/algeria-cities-api.git
composer install
cd public/
php -S localhost:8888
```


## Features

| Verb | URI                  | Result                                        |
|------|----------------------|-----------------------------------------------|
| GET  | /cities              | Get all cities                                |
| GET  | /cities/{id}         | Get a city by its id                          |
| GET  | /cities/{name}       | Get a city by its name                        |
| GET  | /regions             | Get all wilayas/regions                       |
| GET  | /regions/{id}        | Get a wilaya/region by its id                 |
| GET  | /regions/name/{name} | Get a wilaya/region by its name               |
| GET  | /region/id/{id}      | Get all cities of a wilaya/region by its id   |
| GET  | /region/name/{name}  | Get all cities of a wilaya/region by its name |


## Credits

The list of wilayas are collected from [Wilaya-Of-Algeria](https://github.com/AbderrahmeneDZ/Wilaya-Of-Algeria/blob/master/Wilaya_Of_Algeria.json)

The list of cities are collected from  [Cities-Of-Algeria](https://github.com/othmanus/algeria-cities/blob/master/json/algeria_cities.json)