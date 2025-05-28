<?php

namespace taskforce\logic;

use DateTime;
use taskforce\abstract\AbstractAction;
use taskforce\logic\actions\CancelAction;
use taskforce\logic\actions\CompleteAction;
use taskforce\logic\actions\DenyAction;
use taskforce\logic\actions\ResponseAction;
use taskforce\logic\actions\StatusActionException;

class AvailableActions
{
  const STATUS_NEW = 'new';
  const STATUS_IN_PROGRESS = 'proceed';
  const STATUS_CANCEL = 'cancel';
  const STATUS_COMPLETE = 'complete';
  const STATUS_EXPIRED = 'exired';

  const ACTION_RESPONSE = 'act_response';
  const ACTION_CANCEL = 'act_cancel';
  const ACTION_DENY = 'act_deny';
  const ACTION_COMPLETE = 'act_complete';

  const ROLE_PERFORMER = 'performer';
  const ROLE_CLIENT = 'customer';

  private ?int $performerId;
  private ?int $clientId;

  private ?string $status = null;
  private $finishDate = null;

  /**
   * AvailableActions strategy constructor
   * @param string $status;
   * @param int|null $performedId;
   * @param int $clientId;
   */

  public function __construct(string $status, ?int $performerId, int $clientId)
  {
    $this->setStatus($status);

    $this->performerId = $performerId;
    $this->clientId = $clientId;
  }

  public function setFinishDate(DateTime $dt)
  {
    $curDate = new DateTime();

    if ($dt > $curDate) {
      $this->finishDate = $dt;
    }
  }

  public function getAvailableActions(string $role, int $id): array
  {
    // $this->checkRole($role);
    $statusActions = $this->statusAllowedActions()[$this->status];
    $roleActions = $this->roleAllowedActions()[$role];

    $allowedActions = array_intersect($statusActions, $roleActions);

    $allowedActions = array_filter($allowedActions, function ($action) use ($id) {
      return $action::checkRights($id, $this->performerId, $this->clientId);
    });

    return array_values($allowedActions);
  }

  public function getNextStatus(AbstractAction $action): ?string
  {
    $map = [
      CompleteAction::class => self::STATUS_COMPLETE,
      CancelAction::class => self::STATUS_CANCEL,
      DenyAction::class => self::STATUS_CANCEL,
      ResponseAction::class => null
    ];

    // // Получаем имя класса действия
    // $actionClass = is_object($action) ? get_class($action) : $action;
    
    // return $map[$actionClass] ?? null;
    return $map[get_class($action)];
  }

  public function setStatus(string $status): void
  {
    $availableStatuses = [
      self::STATUS_NEW,
      self::STATUS_IN_PROGRESS,
      self::STATUS_CANCEL,
      self::STATUS_COMPLETE,
      self::STATUS_EXPIRED
    ];

    if (!in_array($status, $availableStatuses)) {
      // throw new StatusActionException("Неивестная роль: $role");
    }
    $this->status = $status;
  }

  /**
   * Возвращает действия, доступные для каждой роли
   * @return array
   */

  private function roleAllowedActions(): array
  {
    $map = [
      self::ROLE_CLIENT => [CancelAction::class, CompleteAction::class],
      self::ROLE_PERFORMER => [ResponseAction::class, DenyAction::class]
    ];

    return $map;
  }

  /**
   * Возвращает действия, доступные для каждого статуса
   * @return array
   */

  private function statusAllowedActions(): array
  {
    $map = [
      self::STATUS_CANCEL => [],
      self::STATUS_COMPLETE => [],
      self::STATUS_IN_PROGRESS => [DenyAction::class, CompleteAction::class],
      self::STATUS_NEW => [CancelAction::class, ResponseAction::class],
      self::STATUS_EXPIRED => []
    ];

    return $map;
  }

  // private function getStatusMap()
  // {
  //   $map = [
  //     self::STATUS_NEW => [self::STATUS_EXPIRED, self::STATUS_CANCEL],
  //     self::STATUS_IN_PROGRESS => [self::STATUS_CANCEL, self::STATUS_COMPLETE],
  //     self::STATUS_CANCEL => [],
  //     self::STATUS_COMPLETE => [],
  //     self::STATUS_EXPIRED => [self::STATUS_CANCEL]
  //   ];

  //   return $map;
  // }
}
