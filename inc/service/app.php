<?php

class App
{
    private static $controllerName;

    /**
     * шаблон вызовф controller и action по $_GET параметрам из url
     */
    public function __construct()
    {
        $url = (isset($_GET["url"])) ? trim($_GET["url"]) : APP_DEFAULT_CONTROLLER;
        $urlParts = explode("/", rtrim($url, "/"));

        $actionParams = array_slice($urlParts, 2);

        self::$controllerName = $urlParts[0];
        $controllerName = self::$controllerName . "Controller";

        $controller = new $controllerName;

        $actionName = (isset($urlParts[1])) ? $urlParts[1]."Action" : "indexAction";

        if(method_exists($controller, $actionName)){
            call_user_func(array($controller, $actionName), $actionParams);
        }else{
            throw new Exception("Action not found");
        }
    }

    public static function getCurrentController(){
        return self::$controllerName;
    }
}