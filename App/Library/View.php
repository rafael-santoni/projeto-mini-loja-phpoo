<?php

namespace App\Library;

// use app\library\Auth;
use Exception;
use App\Library\Auth;
use App\Library\CartInfo;
use League\Plates\Engine;

class View
{
    private static array $instances = [];

    private static function addInstances($instanceKey, $instanceClass)
    {
        if(!isset(self::$instances[$instanceKey])) {
            self::$instances[$instanceKey] = $instanceClass;
        }
    }

    public static function render(string $view, array $data = [])
    {
        $path = dirname(__FILE__, 3);
        $filePath = $path.DIRECTORY_SEPARATOR.'App'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR;

        if(!file_exists($filePath.$view.'.php')) {
            throw new Exception("View {$view} does not exist! :(");
        }

        self::addInstances('cart', CartInfo::class);
        self::addInstances('auth', Auth::class);
        // self::addInstances('auth', new Auth);

        $templates = new Engine($filePath);
        $templates->addData(['instances' => self::$instances]);
        echo $templates->render($view, $data);
    }
}
