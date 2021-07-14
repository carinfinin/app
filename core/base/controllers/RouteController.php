<?php
namespace base\controllers;

class RouteController
{
    static private $_inctance;


    private function __construct()
    {

    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

//    шаблонное проектрование  (сингл тон)
    static public function getInstance () {
        if(self::$_inctance instanceof self) {
            return self::$_inctance;
        }

        return self::$_inctance = new self;
    }
}