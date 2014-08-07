<?php

/**
 * подключение сервисных классов
 */
spl_autoload_register(function($class){
    $classFileName = "inc/service/" . strtolower($class) . ".php";

    if(file_exists($classFileName)){
        require_once($classFileName);
        return true;
    }
});

/**
 * подключение котроллеров
 */
spl_autoload_register( function($class){
    $controllerFlag = strpos($class, "Controller");
    if($controllerFlag === false){
        return false;
    }

    if($class == "Controller"){
        require_once("inc/service/controller.php");
        return true;
    }

    $controllerName = str_replace("Controller", "", strtolower($class));
    $controllerFileName="inc/controllers/" . $controllerName . ".php";

    if(file_exists($controllerFileName)){
        require_once($controllerFileName);
        return true;
    }
} );