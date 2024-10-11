<?php
require_once('setup.php');

echo $blade->run("index", array('roomArray'=>$roomArray));

MySQL::closeConnection();
?>