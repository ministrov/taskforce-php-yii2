<?php
require_once 'vendor/autoload.php';
ini_set('assert.exception', 1);

use taskforce\logic\AvailableActions;

use taskforce\greetings\Greeting;

$strategy = new AvailableActions(AvailableActions::STATUS_NEW, 3, 1);

var_dump('new -> performer', $strategy->getStatusMap());
var_dump('new -> client,alien', $strategy->getStatusMap());
var_dump('new -> client,same', $strategy->getStatusMap());

var_dump('proceed -> performer,same', $strategy->getStatusMap());

assert($strategy->getNextStatus(AvailableActions::ACTION_CANCEL) == AvailableActions::STATUS_CANCEL, 'cancel action');

print_r($strategy);

print('<br>');

$greeting = new Greeting("Hello World!");

echo $greeting->getGreeting("Greeting");

print_r($greeting);

$greeting_2 = new Greeting('How is it going?');

print_r($greeting_2);