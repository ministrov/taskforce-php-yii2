<?php 

class Greeting 
{
  public $greeting = null;

  public function __construct($greeting)
  {
    $this->greeting = $greeting;
  }

  public function getGreeting($greeting)
  {
    return "I would like to $greeting you";
  }
}

$greeting = new Greeting("Hello World!");

echo $greeting->getGreeting("Greeting");