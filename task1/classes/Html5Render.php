<?php
class Html5Render extends AbstractRender
{    
    public function show()
    {
        if ($this->iWidth > 1000 || $this->iHeight > 1500) {
            throw new Exception('Размеры слишком большие. Фигуры не должны выходить за размер 1000x1500');
        }
        
        $sItems = '';
        foreach ($this->arParams as $oShape)
        {
            $sRenderClass = get_class($oShape).'Html5Render';
            if (Controller::initClasses($sRenderClass)) {
                $sItems .= $sRenderClass::draw($oShape)."\n";
            }
        }
        
$sHtml = <<<EOT
    <h2>Результат</h2>

    <canvas id="myCanvas" width="{$this->iWidth}" height="{$this->iHeight}"></canvas>
    <script>
        var canvas = document.getElementById('myCanvas');
        var context = canvas.getContext('2d');
        {$sItems}
    </script>
EOT;
        echo $sHtml;
    }
}