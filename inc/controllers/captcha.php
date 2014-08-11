<?php

class CaptchaController
{
    private static $textCaptcha;

    public static function getCaptcha()
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
        var_dump(self::$textCaptcha);
        return $captchaText;
    }

    public function showAction($prefix = ""){
        //$question = Captcha::getCaptchaQuestion($prefix);
        var_dump(self::$textCaptcha);

        $pic = new ImageModel();
        $pic->setText(self::$textCaptcha)->send();
    }
}