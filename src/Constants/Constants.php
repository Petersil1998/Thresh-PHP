<?php

namespace Thresh\Constants;

/**
 * This class contains API_BASE_PATHS Constants (some have placeholders) and the Data Dragon Version
 * @package Thresh\Constants
 */
class Constants
{
    private static $ddragonVersion;

    const LEAGUE_API_BASE_PATH = 'https://{platform}.api.riotgames.com/lol/';
    const TFT_API_BASE_PATH = 'https://{platform}.api.riotgames.com/tft/';
    const RIOT_API_BASE_PATH = 'https://{region}.api.riotgames.com/riot/';
    const DDRAGON_BASE_PATH = 'https://ddragon.leagueoflegends.com/';
    const STATIC_DATA_BASE_PATH = 'http://static.developer.riotgames.com/docs/lol/';
    const SPECTATOR_URL = 'spectator.{platform}.lol.riotgames.com:80';

    /**
     * This Method returns the current Data Dragon (DDragon) Version
     * @return string
     */
    public static function getDataDragonVersion(){
        return self::$ddragonVersion;
    }

    /**
     * Used to set the Data Dragon Version (**Do not use it!**)
     * @param $dataDragonVersion
     */
    public static function setDataDragonVersion($dataDragonVersion){
        self::$ddragonVersion = $dataDragonVersion;
    }
}
