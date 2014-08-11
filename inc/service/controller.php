<?php

abstract class Controller
{
    protected $view;
    protected $session;

    /**
     * создание объектов для отображения и сессии
     */
    public function __construct(){
        $this->view = new View();
        $session = new SessionModel();
        //ob_start();
    }

    /**
     * Возвращает URL для указанных параметров
     * Число параметров - не менее одного
     * Первый - имя контроллера
     * Остальные в порядке использования - имя метода, значения параметров
     * @param $controller
     * @return mixed
     */
    public static function url($controller)
    {
        $args = func_get_args();

        return APP_BASE_URL . implode("/", $args);

    }
}