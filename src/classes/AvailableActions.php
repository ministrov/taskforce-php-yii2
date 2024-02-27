<?php

class AvailableActions {
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
  const ROLE_CLIENT = 'client';

  private $performerId = null;
  private $clientId = null;

  private $status = null;

  /**
   * AvailableActions strategy constructor
   * @param string $status;
   * @param int $performedId;
   * @param int $clientId;
  */

  public function __construct(string $status, ?int $performedId, int $clientId)
  {
    $this->setStatus($status);

    $this->performerId = $performedId;
    $this->clientId = $clientId;
  }

  public function setStatus($status)
  {
    $status = $this->status;

    return $status;
  }
}