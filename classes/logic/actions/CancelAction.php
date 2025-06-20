<?php
namespace taskforce\logic\actions;

use taskforce\abstract\AbstractAction;

class CancelAction extends AbstractAction
{
  public static function getLabel(): string
  {
    return "Отменить";
  }

  public static function getIntervalName(): string
  {
    return "act_cancel";
  }

  public static function checkRights($userId, $performerId, $clientId): bool
  {
    return $userId == $clientId;
  }
}