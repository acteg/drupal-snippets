<?php

// File validators
$validators = [
      'file_validate_extensions' => ['pdf txt'],
      'file_validate_size' => [5242880], // 5 mo
    ];

$form['file'] = [
'#type' => 'file',
'#title' => $this->t('Attachment', [], ['context' => 'Contact form']),
'#description' => [
  '#theme' => 'file_upload_help',
  '#description' => $this->t('A Gettext Portable Object file.'),
  '#upload_validators' => $validators,
],
'#size' => 50,
'#upload_validators' => $validators,
'#attributes' => ['class' => ['file-import-input']],
];

// Add new validation and submit methode.
// If on form you have actions with submit boutton, this act after submit of global form.
$form['actions']['submit']['#validate'][] = array($this, 'validateContactForm');
$form['actions']['submit']['#submit'][] = array($this, 'submitContactForm');

/**
   * {@inheritdoc}
   */
  public function validateContactForm(array &$form, FormStateInterface $form_state) {

    // Check for a new uploaded file.
    $file = _file_save_upload_from_form($form['file'], $form_state, 0);
    if ($file) {
      // Put the temporary file in form_values so we can save it on submit.
      $form_state->setValue('file', $file);
      $realpath = $this->fileSystem->realpath($file->getFileUri());
      // If we need to handle files directelly without use drupal API.
      $all_files = $this->requestStack->getCurrentRequest()->files->get('files', []);
      if (!empty($all_files['file'])) {
        $file_upload = $all_files['file'];
        if ($file_upload->isValid()) {
          $value = $file_upload->getClientOriginalName() . $file_upload->getRealPath();

          $form_state->setValue('field_contact_file_upload_path', [['value' => $value]]);
          return;
         }
      }
      
    }
  }
