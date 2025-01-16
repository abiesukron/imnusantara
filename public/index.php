<?php

ini_set('memory_limit', '-1');
session_start();
date_default_timezone_set("Asia/Bangkok");

require_once __DIR__ . '/../vendor/autoload.php';

use AbieSoft\AsetCode\Sistem;

$app = new Sistem;

$app->start();
