<?php

class View
{
    private $image;

    public function __construct()
    {
        $this->image = new ImageModel();

    }

    /**
     * @param $name имя шаблона для вывода
     * @param array $data данные для заполнения шаблона
     */
    public function renderPartial($name, $data = array())
    {
        if(!empty($data)){
            extract($data);
        }
        require("inc/views/header.php");
        require("inc/views/" . $name . ".php");
        require("inc/views/messages.php");
        require("inc/views/paginator.php");
        require("inc/views/footer.php");
    }
}