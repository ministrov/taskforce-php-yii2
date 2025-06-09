<?php

namespace taskforce\logic\actions;

use taskforce\abstract\AbstractAction;

class DenyAction extends AbstractAction
{
  public static function getLabel(): string
  {
    return "Отказаться";
  }

  public static function getIntervalName(): string
  {
    return "act_deny";
  }

  public static function checkRights($userId, $performedId, $clientId): bool
  {
    return $userId == $performedId;
  }
}