<?php
abstract class AbstractRender
{
    protected $arParams = null;
    protected $iWidth = null;
    protected $iHeight = null;
    
    public function __construct($arParams)
    {
        $this->arParams = $arParams;
    }
    
    public function setWidth($iWidth)
    {
        $this->iWidth = $iWidth;
    }

    public function setHeight($iHeight)
    {
        $this->iHeight = $iHeight;
    }
    
    abstract public function show();
}