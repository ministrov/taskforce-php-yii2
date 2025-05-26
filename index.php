<?php
// require_once 'vendor/autoload.php';
// ini_set('assert.exception', 1);

// use taskforce\logic\AvailableActions;
// use taskforce\validators\FormValidator;

// $strategy = new AvailableActions(AvailableActions::STATUS_NEW, 3, 1);
// $formValidator = new FormValidator($_POST, ['title', 'description']);

// var_dump('new -> performer', $strategy->getAvailableActions(AvailableActions::ROLE_PERFORMER, 2));
// var_dump('new -> client,alien', $strategy->getAvailableActions(AvailableActions::ROLE_CLIENT, 2));
// var_dump('new -> client,same', $strategy->getAvailableActions(AvailableActions::ROLE_CLIENT, 1));

// var_dump('proceed -> performer,same', $strategy->getAvailableActions(AvailableActions::ROLE_PERFORMER, 3));

// print_r($formValidator->formData);
// echo FormValidator::$name = 'static';

// assert($strategy->getNextStatus(AvailableActions::ACTION_CANCEL) == AvailableActions::STATUS_CANCEL, 'cancel action');
require_once 'vendor/autoload.php';
ini_set('assert.exception', 1);

use taskforce\logic\AvailableActions;
use taskforce\validators\FormValidator;

$strategy = new AvailableActions(AvailableActions::STATUS_NEW, 3, 1);
$formValidator = new FormValidator($_POST, ['title', 'description']);
FormValidator::$name = 'static name';

echo 'new -> performer: ' . print_r($strategy->getAvailableActions(AvailableActions::ROLE_PERFORMER, 2), true) . '<br>';
echo 'new -> client,alien: ' . print_r($strategy->getAvailableActions(AvailableActions::ROLE_CLIENT, 2), true) . '<br>';
echo 'new -> client,same: ' . print_r($strategy->getAvailableActions(AvailableActions::ROLE_CLIENT, 1), true) . '<br>';

echo 'proceed -> performer,same: ' . print_r($strategy->getAvailableActions(AvailableActions::ROLE_PERFORMER, 3), true) . '<br>';

echo 'Form data: ' . print_r($formValidator->formData, true) . '<br>';
echo 'Static name: ' . FormValidator::$name . '<br>';

assert($strategy->getNextStatus(AvailableActions::ACTION_CANCEL) == AvailableActions::STATUS_CANCEL, 'cancel action');

