<?php

class GuestbookModel{

    private $dataUser = array();

    public function __construct()
    {

    }

    /**
     * получение данных пользователя из формы
     * @return bool
     */
    public function getData()
    {
        $this->dataUser["name"] = isset($_POST["name"]) ? trim($_POST["name"]) : "";
        $this->dataUser["email"] = isset($_POST["email"]) ? trim($_POST["email"]) : "";
        $this->dataUser["message"] = isset($_POST["message"]) ? trim($_POST["message"]) : "";
        $this->dataUser["answer"] = isset($_POST["captcha"]) ? trim($_POST["captcha"]) : "";
        return true;
    }



}