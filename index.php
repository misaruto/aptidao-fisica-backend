<?php
require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/src/app.php';


$app = $app();

$basePath = str_replace('/' . basename(__FILE__), '', $_SERVER['SCRIPT_NAME']);
$app = $app->setBasePath($basePath);

$app->run();