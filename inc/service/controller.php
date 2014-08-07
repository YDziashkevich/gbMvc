<?php

abstract class Controller
{
    protected $view;
    protected $session;

    public function __construct(){
        $this->view = new View();
    }
}