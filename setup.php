<?php

require_once('BladeOne.php');
require_once('room.php');

use eftec\bladeone\BladeOne;
MySQL::generateConnection();

$roomArray = Room::loadFromDatabase();

$blade = new BladeOne(__DIR__.'/views', __DIR__.'/cache', BladeOne::MODE_DEBUG);

?>