<?php 
use components\Router;
use components\View;
	
define('ROOT', dirname('__FILE__'));

include_once(ROOT.'/components/Autoloader.php');

session_start();

$route = new Router();
$route->run();
	
