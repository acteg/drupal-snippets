```php
/**
  * This is an example of WHAT NOT TO DO! DON'T DO THIS!
  *
  */
function hook_update_8xxx() {
  //For the love of Drupal, do not do this.
  \Drupal::entityDefinitionUpdateManager()->applyUpdates(); //No, really, don't do this.
  //Are you still trying to do this?  Don't.
}

/**
 * Update 8001 - Create maestro_process_status entity.
 */
function maestro_update_8001() {
  //check if the table exists first.  If not, then create the entity.
  if(!db_table_exists('maestro_process_status')) {
    \Drupal::entityTypeManager()->clearCachedDefinitions();
    \Drupal::entityDefinitionUpdateManager()
      ->installEntityType(\Drupal::entityTypeManager()->getDefinition('maestro_process_status'));
  }
  else {
    return 'Process Status entity already exists';
  }
}

```

The update hook is found in the maestro.install file and I've removed some of the extra Maestro-specific code to simply show how to get your content entity recognized and installed. 

1. We do a simple check to see if the maestro_process_status table exists.  Since content entities store their data in the database, if the table doesn't exist, our content entity is not installed. 
2. We clear the cached definitions from the entityTypeManager.  This should force Drupal to read in all of the definitions from storage.
3. Using the entityDefinitionUpdateManager (also used in the "wrong" example), we use the installEntityType method which takes an entity definition as an input.
4. We pass in the maestro_process_status definition using the getDefinition method of the entityTypeManager object.
At this point, Drupal installs the entity based on the definition I showed above.  Your content entity is installed, including the database table associated with the entity.

See http://www.nextide.ca/create-content-entity-during-update.
