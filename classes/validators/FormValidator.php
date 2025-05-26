<?php
namespace taskforce\validators;

interface FieldValidator
{
  public function getErrors();
  public function validate();
  public function validateField($name);
}

class FormValidator implements FieldValidator
{
  const METHOD = 'post';
  public static $name;
  public $formData;
  public $requiredFields;

  private $errors = [];

  public function __construct($formData = [], $requiredFields = []) 
  {
    $this->formData = $formData;
    $this->requiredFields = $requiredFields;
  }

  public function getErrors()
  {
    return $this->errors or self::METHOD;
  }

  public function validate() 
  {
    $fields = array_merge($this->requiredFields, array_keys($this->formData));
    $errors = [];

    foreach ($fields as $field) {
      $errors[$field] = $this->validateField($field);
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