<?php 
namespace taskforce\greetings;

class Greeting
{
  public $greeting;

  public function __construct($greeting = null)
  {
    $this->greeting = $greeting;
  }

  public function getGreeting($greeting)
  {
    return "Greeting: {$this->$greeting}";
  }

  // public function __toString()
  // {
  //   return $this->$greeting;
  // }
}
