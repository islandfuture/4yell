<?php
abstract class AbstractShape
{
    protected $arBounds = array(
        "x1" => null,
        "y1" => null,
        "x2" => null,
        "y2" => null
    );
    
    protected $arParams = array(
        "border" => 0,
        "color" => "rgb(200,200,200)",
        "bgColor" => "rgb(230,230,230)"
    );
    
    abstract public function getMaxX();
    abstract public function getMaxY();
    
    public function __get($name)
    {
        if (isset($this->arParams[$name])) {
            return $this->arParams[$name];
        } else {
            throw new Exception('Свойство '.$name.' не найдено.');
        }
    }

    public function __isset($name)
    {
        if (isset($this->arParams[$name])) {
            return true;
        }
        return false;
    }
    
    public function __set($name,$val)
    {
        $this->arParams[$name] = $val;
    }

    public function getBounds()
    {
        return $this->arBounds;
    }
    
    public function __construct($arParams)
    {
        foreach($arParams as $key => $val)
        {
            $this->arParams[$key] = $val;
        }
        
        $this->init();
    }
    
}