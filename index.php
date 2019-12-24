<?php
include_once 'config/config.inc.php';
include_once 'vendor/autoload.php';

use app\App;

$run = new App;
$run->boot();