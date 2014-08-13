<?php

class ImageModel extends Model {

    protected $font ="consola.ttf";
    protected $imgWidth = 50;
    protected $imgHeight = 25;
    protected $text;

    public function setText($text){
        $this->text = $text;
        return $this;
    }

    public function send(){
        // Создаем холст
        $img = imagecreate($this->imgWidth, $this->imgHeight);
        // Создаем цвет фона
        $backGroudColor = imagecolorallocate($img, 238, 238, 0);
        // заполняем фон
        imagefill($img, 0, 0, $backGroudColor);
        // рисуем картинку
        $fontSize = rand(12, 14);
        // Цвет текста
        $textColor = imagecolorallocate( $img, rand(0, 150), rand(0, 150), rand(0, 150) );
        imagettftext(
            $img,   // холст
            $fontSize, // ращмер шрифта
            rand(-10, 10),  // угол наклона
            10,  // сдвиг по горизонтали
            //здесь должен быть сдвиг по вертикали
            ($this->imgHeight + $this->fontSize)/2, // сдвиг по вертикали
            $textColor, // цвет текста
            FONTS_DIR.$this->font,    // имя шрифта
            $this->text[0]
        );   // текст

        $fontSize = rand(12, 14);
        // Цвет текста
        $textColor = imagecolorallocate( $img, rand(0, 150), rand(0, 150), rand(0, 150) );
        imagettftext(
            $img,   // холст
            $fontSize, // ращмер шрифта
            rand(-10, 10),  // угол наклона
            rand(18, 24),  // сдвиг по горизонтали

            ($this->imgHeight + $this->fontSize)/2, // сдвиг по вертикали
            $textColor, // цвет текста
            FONTS_DIR.$this->font,    // имя шрифта
            $this->text[1]
        );   // текст

        $fontSize = rand(12, 14);
        // Цвет текста
        $textColor = imagecolorallocate( $img, rand(0, 150), rand(0, 150), rand(0, 150) );
        imagettftext(
            $img,   // холст
            $fontSize, // ращмер шрифта
            rand(-10, 10),  // угол наклона
            rand(28,34),  // сдвиг по горизонтали

            ($this->imgHeight + $this->fontSize)/2, // сдвиг по вертикали
            $textColor, // цвет текста
            FONTS_DIR.$this->font,    // имя шрифта
            $this->text[2]
        );   // текст




        // заголовк для указания типа
        header('Content-Type: image/png');
        // выводим картинку в поток
        imagepng($img);
        // Очищаем память
        imagedestroy($img);
    }
}