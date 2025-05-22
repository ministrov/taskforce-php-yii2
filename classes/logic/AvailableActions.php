<?php

namespace taskforce\logic;

use DateTime;

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
  private int $clientId;

  private $status = null;
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

  public function getAvailableActions(string $role, int $id)
  {
    $statusActions = $this->statusAllowedActions()[$this->status];
    $roleActions = $this->roleAllowedActions()[$role];
    // $rightRestrictions = $this->getRightsPairs();

    $allowedActions = array_intersect($statusActions, $roleActions);

    // $allowedActions = array_filter($allowedActions, function ($action) use ($rightRestrictions, $id) {
    //   return $rightRestrictions[$action]($id);
    // });

    return array_values($allowedActions);
  }

  /**
   * Возвращает массив необходимых действий
   * @return array
   */
  public function getActionsMap(): array
  {
    return [
      self::ACTION_CANCEL => 'Отменить',
      self::ACTION_RESPONSE => 'Откликнуться',
      self::ACTION_COMPLETE => 'Выполнено',
      self::ACTION_DENY => 'Отказаться'
    ];
  }

  /**
   * 
   * @param string $action
   * @return string|null
   */
  public function getNextStatus(string $action): ?string
  {
    $map = [
      self::ACTION_COMPLETE => self::ACTION_COMPLETE,
      self::ACTION_CANCEL => self::ACTION_CANCEL,
      self::ACTION_DENY => self::ACTION_CANCEL
    ];

    return $map[$action] ?? null;

    // if (isset($map[$action])) {
    //   return $map[$action];
    // } else {
    //   return null;
    // }
  }

  /**
   * @param mixed $status
   * 
   * @return [type]
   */
  public function setStatus($status): void
  {
    $availableStatus = [
      self::STATUS_NEW,
      self::STATUS_CANCEL,
      self::STATUS_COMPLETE,
      self::STATUS_EXPIRED,
      self::STATUS_IN_PROGRESS
    ];

    if (in_array($status, $availableStatus)) {
      $this->status = $status;
    }
  }

  /**
   * Возвращает действия доступные для каждой роли
   * @return array
   */
  private function roleAllowedActions() {}

  /**
   * Возвращает действия, доступные для каждого статуса статуса
   * @param string $status
   * @return array
   */
  private function statusAllowedActions(): array
  {
    $map = [
      self::STATUS_IN_PROGRESS => [],
      self::STATUS_NEW => [],
      self::STATUS_COMPLETE => [],
      self::STATUS_EXPIRED => [],
      self::STATUS_CANCEL => [],
    ];

    return $map;
  }

  /**
   * Возвращает массив необходимых статусов 
   * @return array
   */
  private function getStatusMap(): array
  {
    return [
      self::STATUS_NEW => 'Новое',
      self::STATUS_CANCEL => 'Отменено',
      self::STATUS_EXPIRED => 'Провалено',
      self::STATUS_COMPLETE => 'Выполнено',
      self::STATUS_IN_PROGRESS => 'В работе',
    ];
  }
}
