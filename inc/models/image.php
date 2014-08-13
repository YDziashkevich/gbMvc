<?php

/**
 * Class ImageModel генерирует изображение вопроса каптчи
 */
class ImageModel extends Model {

    protected $font = array("consola.ttf", "Archangelsk.ttf", "SweetAsCandy2.ttf");
    protected $imgWidth = 100;
    protected $imgHeight = 25;
    protected $text;

    /**
     * функция получениия вопроса каптчи
     * @param $text текст вопроса
     * @return $this указатель на объект
     */
    public function setText($text){
        $this->text = $text;
        return $this;
    }

    /**
     * изображение каптчи
     */
    public function send(){
        // Создаем холст
        $img = imagecreate($this->imgWidth, $this->imgHeight);
        // Создаем цвет фона
        $backGroudColor = imagecolorallocate($img, 238, 238, 238);
        // заполняем фон
        imagefill($img, 0, 0, $backGroudColor);

        $captcha=str_split($this->text);

        $i=10;

        foreach($captcha as $sybolm){
        // рисуем картинку
        $fontSize = rand(12, 14);
        // Цвет текста
        $textColor = imagecolorallocate( $img, rand(0, 150), rand(0, 150), rand(0, 150) );
        imagettftext(
            $img,   // холст
            $fontSize, // ращмер шрифта
            rand(-10, 10),  // угол наклона
            $i,  // сдвиг по горизонтали
            ($this->imgHeight + $fontSize)/2, // сдвиг по вертикали
            $textColor, // цвет текста
            FONTS_DIR.$this->font[rand(0,2)],    // имя шрифта
            $sybolm//$this->text[0]   // текст
        );
        $i=$i+10;
        }

        // заголовк для указания типа
        header('Content-Type: image/png');
        // выводим картинку в поток
        imagepng($img);
        // Очищаем память
        imagedestroy($img);
    }
}