# Get elapsed time :
```php
Timer::start('key_test');
// Expensive task...
// Time elapsed in ms.
$timeElapdsed = Timer::read('key_test');
```
