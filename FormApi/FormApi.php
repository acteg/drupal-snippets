<?php


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

    $form['keys']['#attributes']['placeholder'] = 'Search some things';
    $form['actions']['submit']['#validate'][] = array($this, 'validateContactForm');
    $form['actions']['submit']['#submit'][] = array($this, 'submitContactForm');
