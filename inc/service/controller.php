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
    }
}