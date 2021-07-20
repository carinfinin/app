<?php
namespace base\controller;

use base\settings\Settings;
use base\settings\ShopSettings;
class RouteController
{
    static private $_instance;

    protected $routes;

    protected $controller;
    protected $inputMethod;
    protected $outputMethod;
    protected $parameters;


//    шаблонное проектрование  (сингл тон)
    static public function getInstance () {
        if(self::$_instance instanceof self) {
            return self::$_instance;
        }

        return self::$_instance = new self;
    }

    private function __clone()
    {
    }

    private function __construct()
    {
        $address_str = $_SERVER['REQUEST_URI'];

        if(strpos($address_str, '/') === strlen($address_str) && strpos($address_str, '/') !== 0)  {
            $this->redirect(rtrim($address_str, '/'), 301); // редтрект на URL убрали в конце /
        }

        $path = substr($_SERVER['PHP_SELF'], 0, strpos($_SERVER['PHP_SELF'], 'index.php'));

        if($path === PATH) {

            exit();

        }
        else {
            try {
                throw new \Exception('Не коректная директория сайта!');
            }
            catch (\Exception $e) {
                exit($e->getMessage());
            }
        }

    }
}











































