<?php
require_once 'vendor/autoload.php';
ini_set('assert.exception', 1);

use taskforce\logic\AvailableActions;
use taskforce\logic\actions\ResponseAction;
use taskforce\logic\actions\StatusActionException;

try {
  $strategy = new AvailableActions(AvailableActions::STATUS_NEW, 3, 1);

  $nextStatus = $strategy->getNextStatus(new ResponseAction('NonExistingAction'));
} catch (StatusActionException $e) {
  die($e->getErrorMessage());
}


echo 'new -> performer: ' . print_r($strategy->getAvailableActions(AvailableActions::ROLE_PERFORMER, 2), true) . '<br>';
echo 'new -> client,alien: ' . print_r($strategy->getAvailableActions(AvailableActions::ROLE_CLIENT, 2), true) . '<br>';
echo 'new -> client,same: ' . print_r($strategy->getAvailableActions(AvailableActions::ROLE_CLIENT, 1), true) . '<br>';

echo 'proceed -> performer,same: ' . print_r($strategy->getAvailableActions(AvailableActions::ROLE_PERFORMER, 3), true) . '<br>';

// echo 'Form data: ' . print_r($formValidator->formData, true) . '<br>';

// assert($strategy->getNextStatus(AvailableActions::ACTION_CANCEL) == AvailableActions::STATUS_CANCEL, 'cancel action');

