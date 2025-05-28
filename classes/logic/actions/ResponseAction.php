<?php

namespace taskforce\logic\actions;

use taskforce\abstract\AbstractAction;

class ResponseAction extends AbstractAction
{
  public static function getLabel(): string
  {
    return "Откликнуться";
  }

  public static function getIntervalName(): string
  {
    return "act_response";
  }

  public static function checkRights($userId, $performedId, $clientId): bool
  {
    return $userId !== $performedId;
  }
}