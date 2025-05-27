<?php

namespace taskforce\logic\actions;

use taskforce\abstract\AbstractAction;

class ResponseAction extends AbstractAction
{
  public static function getLabel()
  {
    return "Откликнуться";
  }

  public static function getIntervalName()
  {
    return "act_response";
  }

  public static function checkRights($userId, $performedId, $clientId)
  {
    $userId !== $performedId;
  }
}