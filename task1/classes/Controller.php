<?php
class Controller
{
    protected static $_oInstance=null;
    
    protected function __construct()
    {
    }
    
    public static function I()
    {
        if (null == self::$_oInstance) {
            self::$_oInstance = new Controller();
        }
        
        return self::$_oInstance;
    }

    public static function initClasses($sClassName) {
        if(! class_exists($sClassName,false)) {
            if( file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR.$sClassName.'.php')) {
                include dirname(__FILE__).DIRECTORY_SEPARATOR.$sClassName.'.php';
                return true;
            } else {
                return false;
            }
        }
        return true;
    }

    public function run()
    {
        $arResult = array();
        $iWidth = 0;
        $iHeight = 0;

        $arInput = empty($_POST['shapes']) ? array() : $_POST['shapes'];
        
        if (! is_array($arInput)) {
            $arInput = json_decode($arInput,true);
        }

        if (is_array($arInput) && sizeof($arInput) > 0) {
            self::initClasses('AbstractShape');
            foreach ($arInput as $arShape) {
                $sClassName = $arShape['type'].'Shape';
                if (self::initClasses($sClassName)) {
                    $oShape = new $sClassName($arShape['params']);
                    if ($iWidth < $oShape->getMaxX()) {
                        $iWidth = $oShape->getMaxX();
                    }
                    if($iHeight < $oShape->getMaxY()) {
                        $iHeight = $oShape->getMaxY();
                    }
                    $arResult[] = $oShape;
                } else {
                    // @todo добавить обработку ошибок
                }
            }
        }
        
        if (empty($_POST['format'])) {
            $_POST['format'] = 'Html5';
        }
                
        self::initClasses('AbstractRender');
        self::initClasses('ShapeRender');
        $sClassName = $_POST['format'] .'Render';
        if (self::initClasses($sClassName)) {
            $oRender = new $sClassName($arResult);
            
            $oRender->setWidth($iWidth);
            $oRender->setHeight($iHeight);
        }
        
        include realpath(__DIR__.DIRECTORY_SEPARATOR.'..').DIRECTORY_SEPARATOR.'page.php';
    }
    
}