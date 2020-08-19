<?php

namespace src\Helper;

class Config
{
    /**
     * @var array
     */
    private static $configs;

    private static function loadConfig(){
        $fileHandler = new FileHandler(BASE_PATH.'/src/config.json', 'r');
        self::$configs = json_decode($fileHandler->read(),1);
        $fileHandler->close();
    }

    /**
     * @param $key string
     * @return string
     */
    public static function getConfig($key){
        if(!isset(self::$configs))
            self::loadConfig();
        return self::$configs[$key];
    }
}
