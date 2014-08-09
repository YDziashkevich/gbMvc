<?php

class MainController extends Controller
{
    private $captcha;
    private $messages;

    public function __construct()
    {
        parent::__construct();
        $this->captcha = new CaptchaController();
        $this->messages = new MessageModel();
    }


    public function indexAction($numPage)
    {
        $formData = array();

        //установка по умолчанию номера страницы сообщений
        $numPage = ($numPage != null) ? (int)$numPage : 1;

        //проверка отправлена форма, и если да, то ее валидация
        if(!empty($_POST) && isset($_POST["ok"])){
            $validate = $this->messages->validateData();
        }

        //если форма валидна, добовляем сообщения
        if(!$validate){
            $formData["errors"] = $this->messages->getErrors();
        }else{
            $this->messages->putMessage();
            header('Location: '.$_SERVER['REQUEST_URI']);
            exit();
        }

        //получение среза сообщений для текуще страницы
        $messages = $this->messages->getMessages();
        $startIndex = ($numPage-1)*VIEW_DEFAULT_NUM_MESSAGES;
        $messagesSlice = array_slice($messages, $startIndex, VIEW_DEFAULT_NUM_MESSAGES);

        //генерируем каптчу
        $captcha = CaptchaController::getCaptcha();

        //формирование данных для вывода формы
        $formData["sizeStorage"] = count($messages);
        $formData["captcha"] = $captcha;
        $formData["messages"] = $messagesSlice;
        $formData["page"]=$numPage;

        //вывод формы
        $this->view->renderPartial("main", $formData);
    }
}