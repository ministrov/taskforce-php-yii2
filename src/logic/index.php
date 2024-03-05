<?php
require_once 'vendor/autoload.php';
ini_set('assert.exception', 1);

use taskforce\logic\AvailableActions;

$strategy = new AvailableActions(AvailableActions::STATUS_NEW, 3, 1);

var_dump('new -> performer', $strategy->getStatusMap());
var_dump('new -> client,alien', $strategy->getStatusMap());
var_dump('new -> client,same', $strategy->getStatusMap());

var_dump('proceed -> performer,same', $strategy->getStatusMap());

assert($strategy->getNextStatus(AvailableActions::ACTION_CANCEL) == AvailableActions::STATUS_CANCEL, 'cancel action');