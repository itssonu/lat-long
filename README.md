# lat-long
get lat long by address

```cmd
composer require itssonu/lat-long
```

# get lat long
## get lat
```php
use itssonu\LatLong;
$latLong = new LatLong;
$lat = $latLong->getLat($address);
```
## get long
```php
use itssonu\LatLong;
$latLong = new LatLong;
$long = $latLong->getLong($address);
```