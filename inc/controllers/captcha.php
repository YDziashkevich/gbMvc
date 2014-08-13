<?php

class CaptchaController
{
    private static $textCaptcha;

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
        self::$textCaptcha=$captchaText;

        $this->textCaptcha=$captchaText;

        return $captchaText;
    }

    public function showAction($prefix = ""){
        $pic = new ImageModel();
        $pic->setText(self::getCaptcha())->send();
    }
}