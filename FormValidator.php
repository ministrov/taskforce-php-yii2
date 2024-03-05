<?php

class FormValidator
{
  const METHOD = 'post';
  public $formData = [];
  public $requiredFields = [];

  private $errors = [];

  public function __construct($formData = [], $requiredFields = []) {}

  public function getErrors()
  {
    return $this->errors or self::METHOD;
  }

  public function validate() 
  {
    $fieds = array_merge($this->requiredFields, array_keys($this->formData));
    $errors = [];

    foreach ($fieds as $fied) {
      $errors[$fied] = $this->validateField($fied);
    }

    $this->errors = array_filter($errors);

    return empty($this->errors);
  }

  public function validateField($name) 
  {
    if (empty($this->requiredFields[$name])) {
      return "Это полу должно быть заполнено";
    }

    return null;
  }
}