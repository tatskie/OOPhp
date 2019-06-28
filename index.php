<?php 

// Include Config
require('config.php');
require('Classes/Bootstrap.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
