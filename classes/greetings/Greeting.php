<?php

namespace taskforce\greetings;

class Greeting
{
  public $greeting = 'Hello'; // Default value

  public function __construct($greeting = null)
  {
    if ($greeting !== null) {
      $this->greeting = $greeting;
    }
  }

  public function getGreeting()
  {
    return "Greeting: {$this->greeting}";
  }
}
