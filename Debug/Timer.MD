# Get elapsed time :
```php
use Drupal\Component\Utility\Timer;

Timer::start('key_test');
// Expensive task...
// Time elapsed in ms.
$timeElapdsed = Timer::read('key_test');
```
