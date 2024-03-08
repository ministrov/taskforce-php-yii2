<?php
namespace taskforce\concrete;

use taskforce\abstract\AbstractClass;

class ConcreteClass1 extends AbstractClass
{
  protected function getValue()
  {
    return "ConcreteClass1";
  }

  public function prefixValue($prefix)
  {
    return "{$prefix}ConcreteClass1";
  }
}