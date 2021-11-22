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

## Get lat
```php
$lat = $latLong->getLat($address);
```
## Get long
```php
$long = $latLong->getLong($address);
```