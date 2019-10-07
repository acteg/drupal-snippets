Drupal.t('The quick brown fox jumped @count times', {'@count': 5});
// Always use @count in the translated text.
Drupal.formatPlural(5, 'The quick brown fox jumped 1 time', 'The quick brown fox jumped @count times');
