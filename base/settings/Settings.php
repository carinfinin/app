<?php


namespace base\settings;


class Settings
{
    static private $_instance;

    private $routes = [
        'admin' => [
            'alias' => 'admin',
            'path' => 'base/admin/controller/',
            'hrUrl' => false, // ЧПУ
        ],
        'settings' => [
            'path' => 'base/settings/',
        ],
        'plugins' => [
            'path' => 'base/plugins/',
            'hrUrl' => false, // ЧПУ
        ],
        'user' => [
            'path' => 'base/user/controller/',
            'hrUrl' => true, // ЧПУ
            'routes' => [

            ]
        ],
        'default' => [
            'controller' => 'IndexController',
            'inputMethod' => 'inputData',
            'outputMethod' => 'outputData'
        ],
    ];
    private $templateArr = [
        'text' => ['name', 'phone', 'address'],
        'textarea' => ['content', 'keywords'],
    ];

    private  function __construct()
    {
    }

    private function __clone()
    {
    }

    static public function get($properties) {
        return self::instance()->$properties;
    }

    static public function instance() {
        if(self::$_instance instanceof self) {
            return self::$_instance;
        }
        return self::$_instance = new self;
    }

    public function clueProperties($class) {
        $baseProperties = [];

        foreach ($this as $name => $item) {
            $properties = $class::get($name);
            $baseProperties[$name] = $properties;

            if(is_array($properties) && is_array($item)) {
                $baseProperties[$name] = $this->arrayMergeRecursive($this->$name, $properties);
                continue;
            }
            if(!$properties) $baseProperties[$name] = $this->$name;
        }
        return $baseProperties;
    }

    public function arrayMergeRecursive () {
        $arrays = func_get_args();                        // получить аргументы функции  получим ($this->$name, $properties)
        $base = array_shift($arrays);

        foreach ($arrays as $array) {
            foreach ($array as $key => $value) {
                if(is_array($value) && is_array($base[$key])) {
                    $base[$key] = $this->arrayMergeRecursive($base[$key], $value);
                }
                else {
                    if(is_int($key)) {
                        if(!in_array($value, $base)) array_push($base, $value);
                        continue;
                    }
                    $base[$key] = $value;
                }
            }
        }
        return $base;
    }

}


















































