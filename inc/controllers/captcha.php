<?php

class CaptchaController
{

    /**
     * метод для генерирования вопроса и ответа каптчи
     * вопрос хранится в COOKIE
     * ответ сохраняем в SESSION
     */
    public function getCaptcha()
    {
        $a = rand(10, 18);
        $b = rand(1, 9);
        $symbol = (rand(0, 1)) ? "+" : "-";
        switch ($symbol){
            case "+":
                $ans = $a + $b;
                $captchaText = "$a + $b" . "=";
                break;
            case "-":
                $ans = $a - $b;
                $captchaText = "$a - $b" . "=";
                break;
        }
        $_SESSION["answerCaptcha"]=$ans;
        setcookie("captchaText", $captchaText, time()+300);
    }

    /**
     * Action для вывода изображения каптчи
     */
    public function showAction()
    {
        $pic = new ImageModel();
        $pic->setText($_COOKIE["captchaText"])->send();
    }
}