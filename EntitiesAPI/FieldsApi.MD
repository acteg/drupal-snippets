```php
// Get referenced Entities.
// $id = some node ID
// $field = field name for entity reference field
$node = Node::load($id);

/** @var \Drupal\Core\Field\Plugin\Field\FieldType\EntityReferenceItem $referenceItem */
$referenceItem = $node->get($field)->first();

/** @var \Drupal\Core\Entity\Plugin\DataType\EntityReference $entityReference */
$entityReference = $referenceItem->get('entity');

/** @var \Drupal\Core\Entity\Plugin\DataType\EntityAdapter $entityAdapter */
$entityAdapter = $entityReference->getTarget();

/** @var \Drupal\Core\Entity\EntityInterface $referencedEntity */
$referencedEntity = $entityAdapter->getValue();
// At this point $referencedEntity is the referenced entity object.
// Get list of referenced Entities .
$node->get($field)->referencedEntities();

// Get referenced entity.
$node->field_image->entity
```
