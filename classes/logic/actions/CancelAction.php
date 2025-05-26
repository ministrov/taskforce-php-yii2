<?php
namespace taskforce\logic\actions;

use taskforce\abstract\AbstractActions;

class CancelAction extends AbstractActions
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