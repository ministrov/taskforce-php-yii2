<?php
require_once 'vendor/autoload.php';
ini_set('assert.exception', 1);

use taskforce\logic\AvailableActions;
use taskforce\logic\actions\ResponseAction;
use taskforce\logic\actions\StatusActionException;

try {
  // init bootstrapping phase 
  $config_file_path = "config.php";
  if (!file_exists($config_file_path)) {
    throw new Exception("Configuration file not found.");
  }

  // continue execution of the bootstrapping phase 
} catch (Exception $e) {
  echo $e->getMessage();
  die();
}

// try {
//   intdiv(5, 0);
// } catch (DivisionByZeroError $error) {
//   print("На ноль делить нельзя!");
// }

// error_reporting(E_ALL);

// try {
//   unknown();
// } catch (Error $error) {
//   print("Error:" . $error->getMessage());
// }

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
