<?php
require_once 'vendor/autoload.php';
ini_set('assert.exception', 1);

use taskforce\logic\AvailableActions;

use taskforce\concrete\ConcreteClass1;

$strategy = new AvailableActions(AvailableActions::STATUS_NEW, 3, 1);

// var_dump('new -> performer', $strategy->getStatusMap());
// var_dump('new -> client,alien', $strategy->getStatusMap());
// var_dump('new -> client,same', $strategy->getStatusMap());

// var_dump('proceed -> performer,same', $strategy->getStatusMap());

// assert($strategy->getNextStatus(AvailableActions::ACTION_CANCEL) == AvailableActions::STATUS_CANCEL, 'cancel action');
// print_r($strategy->getStatusMap());

// print("<br>");

// print_r($how_it_going->getGreeting("How is it going!"));

// print("<br>");

// print_r($hello_world);

// print("<br>");

// echo $hello_world->getGreeting("Hello World!");

// print("<br>");

// echo $how_it_going->getGreeting("How is it going!");

$class1 = new ConcreteClass1;
$class1->printOut();
echo $class1->prefixValue('FOO_') . "\n";

class Product
{
  public string $name;
  public string $price;


  function __construct(string $name, float $price)
  {
    $this->name = $name;
    $this->price = $price;
  }

  public function getInfo()
  {
    return "Product: {$this->name}, Price: {$this->price}";
  }
}

$product = new Product('Notebook', 888.8);
echo $product->getInfo();

class FormValidator
{
  public $formData = [];
  public $requiredFields = [];

  private $errors = [];

  public function __construct($formData, $requiredFields)
  {
    $this->formData = $formData;
    $this->requiredFields = $requiredFields;
  }

  public function validate()
  {
    $fields = array_merge($this->requiredFields, array_keys($this->formData));
    $errors = [];

    foreach ($fields as $field) {
      $errors[$field] = $this->validateFilled($field);
    }

    $this->errors = array_filter($errors);

    return empty($this->errors);
  }

  public function getErrors()
  {
    return $this->errors;
  }

  public function validateFilled($name)
  {
    if (empty($this->formData[$name])) {
      return "Это поле должно быть заполнено";
    }

    return null;
  }
}

$formValidator = new FormValidator($_POST, ['title', 'description']);

$isFormValid = $formValidator->validate();

if (!$isFormValid) {
  $errors = $formValidator->getErrors();
}
