<?php

namespace src\Helper;

class Config
{
    /**
     * @var array
     */
    private static $configs;

    public static function getConfig($key){
        if(isset(self::$configs[$key])){
            return self::$configs[$key];
        } else {
            throw new \RuntimeException('Config Key '.$key.' not found!');
        }
    }

    public static function setConfig($key, $value){
        self::$configs[$key] = $value;
    }
}
