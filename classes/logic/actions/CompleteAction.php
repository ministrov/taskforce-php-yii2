<?php

namespace taskforce\logic\actions;

use taskforce\abstract\AbstractAction;

class CompleteAction extends AbstractAction
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
