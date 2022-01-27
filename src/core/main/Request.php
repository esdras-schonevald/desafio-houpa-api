<?php

namespace Main;

use Basic\Controller;
use Exception;
use Hooks\PublicGet;

class Request {
    use PublicGet;

    private RequestQuery $query;

    private RequestContent $content;

    private Controller $controller;

    private string $method;

    function __construct(private RestRouter $router)
    {
        $this->method   =   $_SERVER["REQUEST_METHOD"];
        $this->query    =   new RequestQuery();
        $this->content  =   new RequestContent();

        $this->matchRouteURL();
        if (isset($_GET))
        {	foreach ($_GET as $key => $value)
            {   $this->query->$key = $value;
            }
        }

        $input  =   @file_get_contents("php://input");
        foreach (@json_decode($input, 1)??[] as $key => $value){
            $this->content->$key = $value;
        }
    }

    /**
     * Pega url
     * @return string url
     */
    public function getUrl() : string
    {   return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function matchRouteURL(){
        $url        =   $this->getUrl();
        $urlArray   =   explode('/', $url);
        foreach ($this->router->routes as $route => $controller)
        {
            $routeArray = explode('/', $route);
            for($i = 0; $i < count($routeArray); $i++)
            {   if(
                    strpos($routeArray[$i], '{') !== false
                    && count($urlArray) == count($routeArray)
                )
                {
                    $param                  =   str_replace(["{", "}"], "", $routeArray[$i]);
                    $this->query->$param    =   $urlArray[$i];
                    $routeArray[$i]         =   $urlArray[$i];
                }
                $route = implode('/', $routeArray);
            }

            if($url == $route)
            {   $this->controller = Container::controller($controller);
                return true;
            }
        }

        throw new Exception ("PAGE NOT FOUND", 404);
    }
}