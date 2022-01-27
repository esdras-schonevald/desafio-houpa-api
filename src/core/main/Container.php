<?php

Namespace Main;

Class Container
{
	/**
     * Instancia um novo Model
     * @param string $modelName
     * @return \Models\oModel
     */
	public static function model(string $modelName)
	{   $oModel = "\\Models\\" . $modelName;
        return new $oModel;
    }

    /**
     * Instancia uma nova View
     * @param string $viewName
     * @return \Views\oView
     */
	public static function view(string $viewName)
	{   $oView = "\\Views\\" . $viewName;
        return new $oView;
	}

    /**
     * Instancia um novo Controller
     * @param string $controllerName
     * @return \Controllers\oController
     */
	public static function controller(string $controllerName)
	{   $oController = "\\Controllers\\" . $controllerName;
        return new $oController;
	}

}