<?php

namespace Main;

use Main\Container;
use Exception;

class Router
{
    /**
     * @var array <values> array(["route1","controller@action1"],["route2","controller@action2"]...)
     */
    private $routes;

    public function __construct(array $routes)
    {   $this->setRoutes($routes);
    }

    /**
     * Seta as rotas
     * @param array $routes
     * @return array rotas
     */
    private function setRoutes(array $routes) /* : void */
    {   foreach($routes as $index => $route)
        {   $exp = explode('@', $route);
            $newRoutes[] = [$index, $exp[0], $exp[1]];
        }
        $this->routes = $newRoutes;
    }

    /**
     * Pega todos os parametros passados por GET ou por POST
     * @return stdClass objeto request
     */
    private function getRequest() : \stdClass
    {   $obj = new \stdClass;

        if(isset($_GET))
        {	foreach ($_GET as $key => $value)
            {   $obj->get->$key = $value;
            }
        }

        if(isset($_POST))
        {	foreach ($_POST as $key => $value)
            {   $obj->$key = $value;
            }
        }

        return $obj;
    }

    /**
     * Pega url
     * @return string url
     */
    private function getUrl() : string
    {   return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    /**
     * Método de execução
     * @return void
     */
    public function run() /* : void */
    {   $url = $this->getUrl();

        $urlArray = explode('/', $url);

        foreach ($this->routes as $route)
        {   $routeArray = explode('/', $route[0]);

            for($i = 0; $i < count($routeArray); $i++)
            {   if( (strpos($routeArray[$i], '{') !== false)
                && (count($urlArray) == count($routeArray)))
                {   $routeArray[$i] = $urlArray[$i];
                    $param[] = $urlArray[$i];
                }
                $route[0] = implode('/', $routeArray);
            }

            if($url == $route[0])
            {   $found =  true;
                $controllerName = $route[1];
                $action = $route[2];
                break;
            }
        }

        if(!isset($found))
        {   throw new Exception ("PAGE NOT FOUND", 404);
        }

        $oController = Container::controller($controllerName);

        if(isset($param))
        {
            $resp = $oController->$action(...$param, $this->getRequest());
        }
        else
        {	$resp = $oController->$action($this->getRequest());
        }
    }
}