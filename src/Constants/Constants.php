<?php

namespace Thresh\Constants;

class Constants
{
    private static $ddragonVersion;

    const LEAGUE_API_BASE_PATH = "https://{platform}.api.riotgames.com/lol/";
    const TFT_API_BASE_PATH = "https://{platform}.api.riotgames.com/tft/";
    const RIOT_API_BASE_PATH = "https://{region}.api.riotgames.com/riot/";
    const DDRAGON_BASE_PATH = "https://ddragon.leagueoflegends.com/";
    const STATIC_DATA_BASE_PATH = "http://static.developer.riotgames.com/docs/lol/";

    const RANKED_QUEUES = array('RANKED_SOLO_5x5', 'RANKED_FLEX_SR');

    const RANKED_DIVISIONS = array(1, 2, 3, 4);

    const RANKED_TIERS = array('IRON', 'BRONZE', 'SILVER', 'GOLD', 'PLATINUM', 'DIAMOND', 'MASTER',
        'GRANDMASTER', 'CHALLENGER'
    );

    public static function getDDragonVersion(){
        return self::$ddragonVersion;
    }

    public static function setDDragonVersion($ddragonVersion){
        self::$ddragonVersion = $ddragonVersion;
    }
}
