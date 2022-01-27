<?php

namespace Main;

use Hooks\PublicGet;

class RestRouter
{
    use PublicGet;

    private array $routes;

    private Request $request;

    public function __construct(array $routes)
    {   $this->routes   =   $routes;
        $this->request  =   new Request($this);
    }

    /**
     * Método de execução
     * @return void
     */
    public function run(): void
    {
        $controller     =   $this->request->controller;
        $method         =   $this->request->method;
        $controller->$method($this->request);
    }
}