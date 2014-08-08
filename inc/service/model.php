<?php

class Model
{
    protected static $dbc;

    public function __construct()
    {
        if(!self::$dbc){
            self::$dbc = new PDO("mysql: host=".APP_DB_HOST."; dbname=".APP_DB_DATABASE, APP_DB_USER, APP_DB_PASS);
        }
    }
}