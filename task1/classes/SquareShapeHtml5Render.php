<?php
class SquareShapeHtml5Render implements ShapeRender
{
    public static function draw(AbstractShape $oShape)
    {
        $sResult = <<<EOT
        
    context.beginPath();
    context.rect({$oShape->x}, {$oShape->y}, {$oShape->w}, {$oShape->h});
    context.fillStyle = '{$oShape->bgColor}';
    context.fill();
    context.lineWidth = {$oShape->border};
    context.strokeStyle = '{$oShape->color}';
    context.stroke();
EOT;

        return $sResult;
    }
}