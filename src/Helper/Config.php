<?php

namespace Thresh\Helper;

class Config
{
    /**
     * @var array
     */
    private static $configs;

    private static function getConfig($key){
        if(isset(self::$configs[$key])){
            return self::$configs[$key];
        } else {
            throw new \RuntimeException('Config Key '.$key.' not found!');
        }
    }

    private static function setConfig($key, $value){
        self::$configs[$key] = $value;
    }

    public static function getApiKey(){
        return self::getConfig('api_key');
    }

    public static function setApiKey($encryptedApiKey){
        self::setConfig('api_key', $encryptedApiKey);
    }

    /**
     * @return string
     */
    public static function getRegion(){
        return self::getConfig('region');
    }

    /**
     * @param $region
     */
    public static function setRegion($region){
        self::setConfig('region', $region);
    }

    /**
     * @return string
     */
    public static function getPlatform(){
        return self::getConfig('platform');
    }

    /**
     * @param $platform
     */
    public static function setPlatform($platform){
        self::setConfig('platform', $platform);
    }
}
