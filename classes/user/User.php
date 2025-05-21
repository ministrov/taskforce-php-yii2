<?php

namespace taskforce\user;

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
