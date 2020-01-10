<?php


class Config
{
    /**
     * @var array
     */
    private static $configs;

    private static function readConfig(){
        self::$configs = json_decode(file_get_contents('config.json'),1);
    }

    /**
     * @param $key string
     * @return string
     */
    public static function getConfig($key){
        if(!isset(self::$configs))
            self::readConfig();
        return self::$configs[$key];
    }
}
