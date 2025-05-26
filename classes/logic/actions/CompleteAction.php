<?php

namespace taskforce\logic\actions;

use taskforce\abstract\AbstractActions;

class CompleteAction extends AbstractActions
{
  public static function getLabel()
  {
    return "Завершить";
  }

  public static function getIntervalName()
  {
    return "act_complete";
  }

  public static function checkRights($userId, $performerId, $clientId)
  {
    return $performerId == $userId;
  }
}
