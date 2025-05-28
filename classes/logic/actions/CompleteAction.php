<?php

namespace taskforce\logic\actions;

use taskforce\abstract\AbstractAction;

class CompleteAction extends AbstractAction
{
  public static function getLabel(): string
  {
    return "Завершить";
  }

  public static function getIntervalName(): string
  {
    return "act_complete";
  }

  public static function checkRights($userId, $performerId, $clientId): bool
  {
    return $performerId == $userId;
  }
}
