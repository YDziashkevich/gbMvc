<?php

class BaseController extends Controller
{
    private $messages = array();
    private $base;
    private $xmlDoc = array();

    public function __construct()
    {
        parent::__construct();
        $this->messages = new MessageModel();
        $this->base = new BaseModel();
    }

    public function showAction()
    {
        $messages = $this->messages->getMessages();

        if(!empty($_POST) && isset($_POST["baseOk"]) && isset($_POST["baseSelect"])){
            if($_POST["baseSelect"] == "copyBase"){
                echo $this->base->putXml($messages);
            }

            if($_POST["baseSelect"] == "addBase"){
                $this->xmlDoc = $this->base->getXml();
                foreach($this->xmlDoc->item as $value){
                    $message = array();
                    $message["name"] = $value->name;
                    $message["email"] = $value->email;
                    $message["message"] = $value->message;
                    $this->messages->putMessages($message);
                }
            }
            if($_POST["baseSelect"] == "delBase"){

            }
        }
        $this->view->renderPartial("base");
    }
}