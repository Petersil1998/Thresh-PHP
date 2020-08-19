<?php

namespace src\Helper;

use src\Entities\Runes\Rune;
use src\Entities\Runes\RuneStat;
use src\Entities\Runes\RuneStyle;
use src\Entities\Summoner\Summoner;

class Utils
{
    public static function getChampWithoutSpecials($champ)
    {
        if ($champ == "Wukong")
            return "MonkeyKing";
        if ($champ == "Cho'Gath")
            return "Chogath";
        if ($champ == "LeBlanc")
            return "Leblanc";
        if ($champ == "Vel'Koz")
            return "Velkoz";
        if ($champ == "Kai'Sa")
            return "Kaisa";
        if ($champ == "Kha'Zix")
            return "Khazix";
        $ret = str_replace("'", "", $champ);
        $ret = str_replace(" ", "", $ret);
        $ret = str_replace(".", "", $ret);
        return $ret;
    }

    /**
     * @param $summoner Summoner
     * @return string
     */
    public static function getProfileIconURL($summoner){
        return Constants::DDRAGON_BASEPATH.'cdn/'.Constants::getDDragonVersion().'/img/profileicon/'.$summoner->getProfileIcon().'.png';
    }

    /**
     * @param $championId int
     * @return string
     */
    public static function getChampionIconURL($championId){
        return Constants::DDRAGON_BASEPATH . "cdn/" . Constants::getDDragonVersion() . "/img/champion/" . Utils::getChampWithoutSpecials(Constants::CHAMPIONS[$championId]) . ".png";
    }

    /**
     * @param $rune Rune|RuneStat|RuneStyle
     * @return string
     */
    public static function getRuneIconURL($rune){
        return Constants::DDRAGON_BASEPATH.'cdn/img/'.$rune->getIconPath();
    }
}