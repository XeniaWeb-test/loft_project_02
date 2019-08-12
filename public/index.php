<?php

use App\Core\Router;

define('APP_DIR', realpath(__DIR__ . DIRECTORY_SEPARATOR . '../src'));
define('IMG_DIR', realpath(__DIR__ . DIRECTORY_SEPARATOR . '/img/'));
require_once APP_DIR . '/Core/init.php';
require_once APP_DIR . '/Core/Router.php';

$route = new Router();
try {
    $route->run();
} catch (\Exception $e) {

}