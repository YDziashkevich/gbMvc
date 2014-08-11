<?php

class ImageModel extends Model {

    protected $font ="consola.ttf";
    protected $imgWidth = 80;
    protected $imgHeight = 30;
    public static  $text;

    public function setText($text){
        $this->text = $text;
        return $this;
    }

    public function send(){
        // Создаем холст
        $img = imagecreate($this->imgWidth, $this->imgHeight);
        // Создаем цвет фона
        $backGroudColor = imagecolorallocate($img, rand(200,255), rand(200,255), rand(200,255));
        // заполняем фон
        imagefill($img, 0, 0, $backGroudColor);

        // рисуем картинку
        $fontSize = rand(10, 14);
        // Цвет текста
        $textColor = imagecolorallocate( $img, rand(0, 150), rand(0, 150), rand(0, 150) );
        imagettftext(
            $img,   // холст
            $fontSize, // ращмер шрифта
            rand(-10, 10),  // угол наклона
            5,  // сдвиг по горизонтали
            ($this->imgHeight + $this->fontSize)/2, // сдвиг по вертикали
            $textColor, // цвет текста
            FONTS_DIR.$this->font,    // имя шрифта
            self::$text
            );   // текст


        // заголовк для указания типа
        //header('Content-Type: image/png');
        // выводим картинку в поток
        imagepng($img);
        // Очищаем память
        imagedestroy($img);
    }
}