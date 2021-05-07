<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__file__,2));


//load configuration

require_once(ROOT . DS . 'config' . DS . 'config.php');


//Autoload classes 
require_once(ROOT . DS . 'core' . DS .'autoload.php');

use App\Controllers\IndexController;


$app = new Core\Application();

$app->router->get('/test', fn() => 'Testing routing with closure function. Hello World');
$app->router->get('/', [IndexController::class, 'index']);


$app->run();