<?php

class MessageModel extends Model
{
    private $dataUser = array();
    private $errors = array();

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

    public function putMessages($message = array()){
        $message["date"] = date("H:i m.d.y");
        $put = Model::$dbc->prepare("INSERT INTO st_userMessage (name, email, message, date) value (:name, :email, :message, :date)");
        $put->execute($message);
    }

    /**
     * получение данных пользователя из формы
     * валидация данных
     * @return bool результат валидации
     */
    public function validateData()
    {
        $validation = true;

        $this->dataUser["name"] = isset($_POST["name"]) ? trim($_POST["name"]) : "";
        $this->dataUser["email"] = isset($_POST["email"]) ? trim($_POST["email"]) : "";
        $this->dataUser["message"] = isset($_POST["message"]) ? trim($_POST["message"]) : "";
        $this->dataUser["answer"] = isset($_POST["captcha"]) ? trim($_POST["captcha"]) : "";

        if(!preg_match('/^\D{3,}$/', $this->dataUser["name"])){
            $validation = false;
            $this->errors["name"] = "* имя пользователя должно содержать не менее 3 символов";
        }
        if(!preg_match('/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/', $this->dataUser["email"])){
            $validation = false;
            $this->errors["email"] = "* неправильно введен email. Должен быть вида example@mail.com";
        }
        if(strlen($this->dataUser["message"])<20){
            $validation = false;
            $this->errors["message"] = "* сообщение пользователя должно содержать не менее 20 символов";
        }
        if($this->dataUser["answer"]!=$_SESSION["answerCaptcha"]){
            $validation =false;
            $this->errors["captcha"] = "* неправильный ответ";
        }
        if(!$validation){
            return false;
        }else{
            return true;
        }
    }

    /**
     * @return array массив с ошибками валидации
     */
    public function getErrors()
    {
        return $this->errors;
    }
}