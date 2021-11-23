# Lat-Long
[![Issues](https://img.shields.io/github/issues/itssonu/lat-long.svg?style=flat-square)](https://github.com/itssonu/lat-long/issues)
[![Stars](	https://img.shields.io/github/stars/itssonu/lat-long.svg?style=flat-square)](https://github.com/itssonu/lat-long/stargazers)


## Get lat long from address

```cmd
composer require itssonu/lat-long
```

# Get lat long

## Use Pakage
```php 
use itssonu\LatLong;
```
## Initialization
```php 
$latLong = new LatLong;
```
## Get Address
you can get dynamic address from get or post requests , here we use static address
```php 
$address = "clock tower ludhiana punjab";
```
## Get lat long method
```php
$result = $latLong->getLatLong($address);
$lat = $result->lat;
$long = $result->long;
```

## Get lat only
```php
$lat = $latLong->getLat($address);
```
## Get long only
```php
$long = $latLong->getLong($address);
```