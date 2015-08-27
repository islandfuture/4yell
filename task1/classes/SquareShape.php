<?php
class SquareShape extends AbstractShape
{
    public function init()
    {
        if (empty($this->arParams['w'])) {
            throw new Exception('Не указана ширина');
        }
        if (empty($this->arParams['h'])) {
            throw new Exception('Не указана высота');
        }
        if (!isset($this->arParams['x'])) {
            throw new Exception('Не указан X левого верхнего угла');
        }
        if (!isset($this->arParams['y'])) {
            throw new Exception('Не указан Y левого верхнего угла');
        }
        
        
        $this->arBounds['x1'] = $this->arParams['x'];
        $this->arBounds['x2'] = $this->arParams['x'] + $this->arParams['w']+$this->arParams['border'];
        $this->arBounds['y1'] = $this->arParams['y'];
        $this->arBounds['y2'] = $this->arParams['y'] + $this->arParams['h']+$this->arParams['border'];
        
    }
    
    public function getMaxX()
    {
        return $this->arBounds['x2'];
    }
    
    public function getMaxY()
    {
        return $this->arBounds['y2'];
    }
    
}