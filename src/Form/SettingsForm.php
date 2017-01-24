<?php

/**
 * @file
 * Contains \Drupal\userengage\Form\SettingsForm.
 */

namespace Drupal\userengage\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'userengage_admin_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['userengage.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('userengage.settings');

    $form['apiKey'] = [
      '#type' => 'textfield',
      '#title' => t('Your Api Key'),
      '#default_value' => $config->get('apiKey'),
      '#description' => t('<p>Please enter your application key.<br>The api key is a 64 letter and number random string.</p>You can find your API Key at: <a href="https://app.userengage.io/clients/integration/" target="_blank">https://app.userengage.io/clients/integration/</a> '),
      '#required' => TRUE,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();

    $this->config('userengage.settings')
      ->set('apiKey', $values['apiKey'])
      ->save();

    parent::submitForm($form, $form_state);
  }

}