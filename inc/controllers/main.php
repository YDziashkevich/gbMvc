<?php

class MainController extends Controller
{
    private $captcha;
    private $form;

    public function __construct()
    {
        parent::__construct();
        $this->captcha = new CaptchaController();
        $this->form = new GuestbookModel();
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

        }
        $captcha = CaptchaController::getCaptcha();
        $formData["captcha"] = $captcha;
        $this->view->renderPartial("main", $formData);
    }
}