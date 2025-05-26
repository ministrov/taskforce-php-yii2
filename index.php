<?php
require_once 'vendor/autoload.php';
ini_set('assert.exception', 1);

use taskforce\logic\AvailableActions;
use taskforce\validators\FormValidator;

$strategy = new AvailableActions(AvailableActions::STATUS_NEW, 3, 1);
$formValidator = new FormValidator();

var_dump('new -> performer', $strategy->getAvailableActions(AvailableActions::ROLE_PERFORMER, 2)) . '<br/>';
var_dump('new -> client,alien', $strategy->getAvailableActions(AvailableActions::ROLE_CLIENT, 2)) . '<br/>';
var_dump('new -> client,same', $strategy->getAvailableActions(AvailableActions::ROLE_CLIENT, 1)) . '<br/>';

var_dump('proceed -> performer,same', $strategy->getAvailableActions(AvailableActions::ROLE_PERFORMER, 3)) . '<br/>';

var_dump($formValidator->formData);

assert($strategy->getNextStatus(AvailableActions::ACTION_CANCEL) == AvailableActions::STATUS_CANCEL, 'cancel action');

