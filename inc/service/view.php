<?php

class View
{
    public function __construct()
    {

    }

    public function renderPartial($name, $data = array())
    {
        if(!empty($data)){
            extract($data);
        }
        require("inc/views/" . $name . ".php");
    }
}