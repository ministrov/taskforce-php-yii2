<?php

namespace taskforce\logic\actions;

use taskforce\abstract\AbstractAction;

class DenyAction extends AbstractAction
{
  public static function getLabel()
  {
    return "Отказаться";
  }

  public static function getIntervalName()
  {
    return "act_deny";
  }

  public static function checkRights($userId, $performedId, $clientId)
  {
    return $userId == $performedId;
  }
}