<?php
namespace taskforce\logic\actions;

use taskforce\abstract\AbstractAction;

class CancelAction extends AbstractAction
{
  public static function getLabel()
  {
    return "Отменить";
  }

  public static function getIntervalName()
  {
    return "act_cancel";
  }

  public static function checkRights($userId, $performerId, $clientId)
  {
    return $userId == $clientId;
  }
}