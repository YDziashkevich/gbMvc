<?php

class MessageModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getMessages()
    {
        $query = Model::$dbc->query("SELECT * FROM st_userMessage");
        $messages = $query->fetchAll(PDO::FETCH_ASSOC);
        $messages = array_reverse($messages);
        return $messages;
    }

    public function putMessage(){
        $data = array( "name" => $_POST["name"], "email" => $_POST["email"], "message" => $_POST["message"],
            "date" => date("H:i m.d.y"));
        $put = Model::$dbc->prepare("INSERT INTO st_userMessage (name, email, message, date) value (:name, :email, :message, :date)");
        $put->execute($data);
    }



}