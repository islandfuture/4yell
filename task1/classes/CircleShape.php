<?php
class CircleShape extends AbstractShape
{
    public function init()
    {
        if (empty($this->arParams['r'])) {
            throw new Exception('Не указан радиус');
        }
        if (!isset($this->arParams['x'])) {
            throw new Exception('Не указан X центра');
        }
        if (!isset($this->arParams['y'])) {
            throw new Exception('Не указан Y центра');
        }
        
        
        $this->arBounds['x1'] = $this->arParams['x'] - $this->arParams['r'];
        $this->arBounds['x2'] = $this->arParams['x'] + $this->arParams['r']+$this->arParams['border'];
        $this->arBounds['y1'] = $this->arParams['y'] - $this->arParams['r'];
        $this->arBounds['y2'] = $this->arParams['y'] + $this->arParams['r']+$this->arParams['border'];
        
    }
    
    public function getMaxX()
    {
        return $this->arBounds['x2'];
    }
    
    public function getMaxY()
    {
        return $this->arBounds['y2'];
    }
    
    
    public function setCenter()
    {
        
    }

    public function getCenter()
    {
        
    }

}