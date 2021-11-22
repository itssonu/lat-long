# lat-long
get lat long by address

```cmd
composer require itssonu/lat-long
```

# get lat long

## use Pakage
```php 
use itssonu\LatLong;
```
## initialization
```php 
$latLong = new LatLong;
```

## get lat
```php
$lat = $latLong->getLat($address);
```
## get long
```php
$long = $latLong->getLong($address);
```