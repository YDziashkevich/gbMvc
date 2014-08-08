<?php

class MainController extends Controller
{
    private $captcha;
    private $form;
    private $messages;

    public function __construct()
    {
        parent::__construct();
        $this->captcha = new CaptchaController();
        $this->form = new GuestbookModel();
        $this->messages = new MessageModel();
    }


    public function indexAction()
    {
        $formData = array();
        if(!empty($_POST) && isset($_POST["ok"])){
            $validate = $this->form->validateData();
        }
        if(!$validate){
            $formData["errors"] = $this->form->getErrors();
        }else{
            $this->messages->putMessage();
            header('Location: '.$_SERVER['REQUEST_URI']);
            exit();
        }
        $captcha = CaptchaController::getCaptcha();
        $formData["captcha"] = $captcha;
        $formData["messages"] = $this->messages->getMessages();

        $this->view->renderPartial("main", $formData);
    }
}