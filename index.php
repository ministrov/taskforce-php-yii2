<?php
require_once 'vendor/autoload.php';
ini_set('assert.exception', 1);

use taskforce\logic\AvailableActions;

use taskforce\greetings\Greeting;

$strategy = new AvailableActions(AvailableActions::STATUS_NEW, 3, 1);

$how_it_going = new Greeting("How is it going!");

$hello_world = new Greeting("Hello World!");

var_dump('new -> performer', $strategy->getStatusMap());
// var_dump('new -> client,alien', $strategy->getStatusMap());
// var_dump('new -> client,same', $strategy->getStatusMap());

// var_dump('proceed -> performer,same', $strategy->getStatusMap());

// assert($strategy->getNextStatus(AvailableActions::ACTION_CANCEL) == AvailableActions::STATUS_CANCEL, 'cancel action');
print_r($strategy->getStatusMap());

print("<br>");

print_r($how_it_going->getGreeting("How is it going!"));

print("<br>");

print_r($hello_world);

print("<br>");

echo $hello_world->getGreeting("Hello World!");

print("<br>");

echo $how_it_going->getGreeting("How is it going!");
