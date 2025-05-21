<?php
require_once 'vendor/autoload.php';
ini_set('assert.exception', 1);

use taskforce\logic\AvailableActions;

use taskforce\product\Product;

// $timeNow = new DateTime();

// print_r($timeNow->format('Y'));

$strategy = new AvailableActions(AvailableActions::STATUS_NEW, 3, 1);

// print_r($strategy);

// var_dump('new -> performer', $strategy->getStatusMap());
// var_dump('new -> client,alien', $strategy->getStatusMap());
// var_dump('new -> client,same', $strategy->getStatusMap());

class User
{
  public string $name;
  protected string $email;
  private string $password;

  public function setEmail(string $email): void
  {
    $this->email = $email;
  }

  public function getEmail()
  {
    return $this->email;
  }
}

$user = new User();
$user->name = 'Andrey';
$user->setEmail('andrey@mail.ro');
echo $user->getEmail();

// var_dump('proceed -> performer,same', $strategy->getStatusMap());

// assert($strategy->getNextStatus(AvailableActions::ACTION_CANCEL) == AvailableActions::STATUS_CANCEL, 'cancel action');

// print("<br>");

$product = new Product('Coffee', 'Brazilian Taste', 1200);
print_r($product->getInfo());

// print_r($how_it_going->getGreeting("How is it going!"));

// print("<br>");

// print_r($hello_world);

// print("<br>");

// echo $hello_world->getGreeting("Hello World!");

// print("<br>");

// echo $how_it_going->getGreeting("How is it going!");

class Animal
{
  public function makeSound(): string
  {
    return "Звук животного";
  }
}

class Dog extends Animal
{
  public function makeSound(): string
  {
    return "Гав!";
  }

  public function wagTail(): string
  {
    return "Виляю хвостом!";
  }
}

$dog = new Dog();
echo $dog->makeSound(); // Гав!
echo $dog->wagTail();  // Виляю хвостом!
