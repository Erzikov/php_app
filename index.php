<?php
use components\View;
use components\Router;

define('ROOT', dirname('__FILE__'));

include_once(ROOT.'/components/Autoloader.php');

session_start();

$route = new Router();
$route->run();