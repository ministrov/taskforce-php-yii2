<?php

namespace taskforce\abstract;

abstract class AbstractClass
{
  abstract protected function getValue();
  abstract protected function prefixValue($prexif);

  public function printOut() {
    print $this->getValue() . "\n";
  }
}
