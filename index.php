<?php
require_once 'vendor/autoload.php';
ini_set('assert.exception', 1);

use taskforce\logic\AvailableActions;

use taskforce\concrete\ConcreteClass1;

$strategy = new AvailableActions(AvailableActions::STATUS_NEW, 3, 1);

// var_dump('new -> performer', $strategy->getStatusMap());
// var_dump('new -> client,alien', $strategy->getStatusMap());
// var_dump('new -> client,same', $strategy->getStatusMap());

// var_dump('proceed -> performer,same', $strategy->getStatusMap());

// assert($strategy->getNextStatus(AvailableActions::ACTION_CANCEL) == AvailableActions::STATUS_CANCEL, 'cancel action');
// print_r($strategy->getStatusMap());

// print("<br>");

// print_r($how_it_going->getGreeting("How is it going!"));

// print("<br>");

// print_r($hello_world);

// print("<br>");

// echo $hello_world->getGreeting("Hello World!");

// print("<br>");

// echo $how_it_going->getGreeting("How is it going!");

$class1 = new ConcreteClass1;
$class1->printOut();
echo $class1->prefixValue('FOO_') . "\n";
