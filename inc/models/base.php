<?php

class BaseModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function putXml($messages)
    {
        $xml = new SimpleXMLElement("<root/>");
        foreach($messages as $note){
            $item = $xml->addChild("item", "");
            foreach($note as $key=>$value){
                $item->addChild($key, $value);
            }
        }
        return $xml->saveXML("data/base.xml");
    }

    public function getXml()
    {
        return simplexml_load_file("data/base.xml");
    }
}