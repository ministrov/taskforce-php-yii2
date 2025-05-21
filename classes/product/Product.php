<?php

namespace taskforce\product;

class Product {
  public string $name;
  public string $description;
  public int $price;

  public function __construct(string $name, string $description, int $price)
  {
    $this->price = $price;
    $this->name = $name;
    $this->description = $description;
  }

  public function getInfo() {
    return "Product: {$this->name}, Price: {$this->price}, Description: {$this->description}";
  }
}