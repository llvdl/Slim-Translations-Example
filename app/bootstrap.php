<?php

use Slim\App;

require __DIR__ . '/../vendor/autoload.php';

$configuration = array_merge(
    require_once __DIR__ . '/config/settings.php',
    require_once __DIR__ . '/config/dependencies/services.php',
    require_once __DIR__ . '/config/dependencies/middleware.php',
    require_once __DIR__ . '/config/dependencies/actions.php'
);

session_start();
$app = new App($configuration);

require_once __DIR__ . '/config/routes.php';
require_once __DIR__ . '/config/middleware.php';
