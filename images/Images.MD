# Optimize original image :
```php
use Drupal\Component\Utility\Timer;

function my_module_file_create(EntityInterface $entity) {
  if($entity->getEntityTypeId() == 'file') {
    $uri = $entity->getFileUri();
    $image = \Drupal::service('image.factory')->get($uri);

    if ($image->isValid()) {
      $pipeline = ImageAPIOptimizePipeline::load('pngquant_jpegoptim');
      if ($pipeline instanceof ImageAPIOptimizePipeline) {
        $pipeline->applyToImage($uri);
      }
    }
  }
}
```
