<?php

namespace Thresh\Helper;

use RuntimeException;

/**
 * This class stores the configurations
 * @package Thresh\Helper
 */
class Config
{
    /**
     * @var array
     */
    private static $configs;

    /**
     * @param string $key
     * @return string
     */
    private static function getConfig(string $key){
        if(isset(self::$configs[$key])){
            return self::$configs[$key];
        } else {
            throw new RuntimeException('Config Key \''.$key.'\' not found!');
        }
    }

    private static function setConfig($key, $value){
        self::$configs[$key] = $value;
    }

    /**
     * Gets the encrypted API Key
     * @return string
     */
    public static function getApiKey(){
        return self::getConfig('api_key');
    }

    /**
     * Sets the encrypted API Key
     * @param string $encryptedApiKey
     */
    public static function setApiKey(string $encryptedApiKey){
        self::setConfig('api_key', $encryptedApiKey);
    }

    /**
     * Gets the currently set Region
     * @return string
     */
    public static function getRegion(){
        return self::getConfig('region');
    }

    /**
     * Sets the current Region used for API requests
     * @param string $region
     */
    public static function setRegion(string $region){
        self::setConfig('region', $region);
    }

    /**
     * Gets the currently set Platform
     * @return string
     */
    public static function getPlatform(){
        return self::getConfig('platform');
    }

    /**
     * Sets the current Platform used for API requests
     * @param string $platform
     */
    public static function setPlatform(string $platform){
        self::setConfig('platform', $platform);
    }
}
