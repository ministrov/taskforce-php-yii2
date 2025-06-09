<?php 

namespace taskforce\abstract;

abstract class AbstractAction
{
  abstract public static function getLabel(): string;
  abstract public static function getIntervalName(): string;
  abstract public static function checkRights(int $userId, ?int $performedId, ?int $clientId): bool;
}