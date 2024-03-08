<?php
namespace taskforce\logic\actions;

use taskforce\abstract\AbstractCActions;

class CancelAction extends AbstractCActions
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