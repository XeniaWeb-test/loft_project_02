<?php


use App\Controllers\Router;
use App\Tools\ConnectDB;

define('APP_DIR', realpath(__DIR__ . DIRECTORY_SEPARATOR . '../src'));
define('IMG_DIR', realpath($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . '/img/'));
require_once APP_DIR . '/init.php';


$route = new Router();
try {
    $route->run();
} catch (\Exception $e) {

}

