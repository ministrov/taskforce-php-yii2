<?php 

namespace taskforce\abstract;

abstract class AbstractCActions
{
  abstract public static function getLabel();
  abstract public static function getIntervalName();
  abstract public static function checkRights($userId, $performerId, $clientId);
}