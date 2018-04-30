<?php 
namespace components;

Class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT."/config/routes.php";	
        $this->routes = include($routesPath);
    }

    public function run()
    {
        $uri = $this->getURI();
        $result = false;
        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~^$uriPattern$~", $uri)) {
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);

                $controllerName = 'controllers\\'.ucfirst(array_shift($segments).'Controller');
                $actionName = 'action'.ucfirst(array_shift($segments));
                $parametrs = $segments;

                $controllerObject = new $controllerName();
                $result = call_user_func_array(array($controllerObject, $actionName), $parametrs);

                if ($result) {
                    break;
                }
            }        
        }

        if (!$result) {
            include('./views/layouts/404.html');
            header("HTTP/1.0 404 Not Found");
        }
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
				return trim($_SERVER['REQUEST_URI'], '/');
		}	
	}
}
