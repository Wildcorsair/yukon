<?php

require_once __DIR__ . "/../config/common.php";
require_once __DIR__ . "/../vendor/autoload.php";

use Yukon\Core\App\Starter;

$app = new Starter();
$app->run();
