# Weather API


Simple API to get current weather from different sources.

## Setup

* install docker/docker-compose
* create .env file ```cp env-example .env```
* change directory to laradock
* run ```sudo docker-compose up nginx workspace``` 
```sudo docker-compose exec workspace bash```
```composer install```
```exit```
```sudo chmod -R 777 storage PROJECT-DIR/bootstrap/cache```

## Examples
```
curl http://localhost/v1/services/openweathermap/london

{"data":{"temperature":7.170000000000016,"pressure":1012,"humidity":81,"wind":4.1}}

```
