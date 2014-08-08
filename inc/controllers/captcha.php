<?php

class CaptchaController
{
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
        return $captchaText;
    }
}