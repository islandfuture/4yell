<?php
class CircleShapeHtml5Render implements ShapeRender
{
    public static function draw(AbstractShape $oShape)
    {
        $sResult = <<<EOT
        
    context.beginPath();
    context.arc({$oShape->x}, {$oShape->y}, {$oShape->r}, 0, 2 * Math.PI, false);
    context.fillStyle = '{$oShape->bgColor}';
    context.fill();
    context.lineWidth = {$oShape->border};
    context.strokeStyle = '{$oShape->color}';
    context.stroke();
EOT;

        return $sResult;
    }
}