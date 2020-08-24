<?php

namespace src\Helper;

use src\Collections\Champions;
use src\Constants\Constants;
use src\Entities\Runes\Rune;
use src\Entities\Runes\RuneStat;
use src\Entities\Runes\RuneStyle;
use src\Entities\Summoner\Summoner;

class Utils
{
    /**
     * @param $championName string
     * @return string
     */
    public static function getChampWithoutSpecials($championName)
    {
        if ($championName == "Wukong") {
            return "MonkeyKing";
        } elseif ($championName == "Cho'Gath") {
            return "Chogath";
        } elseif ($championName == "LeBlanc") {
            return "Leblanc";
        } elseif ($championName == "Vel'Koz") {
            return "Velkoz";
        } elseif ($championName == "Kai'Sa") {
            return "Kaisa";
        } elseif ($championName == "Kha'Zix") {
            return "Khazix";
        } elseif ($championName == "Nunu & Willump") {
            return "Nunu";
        }
        $ret = str_replace("'", "", $championName);
        $ret = str_replace(" ", "", $ret);
        $ret = str_replace(".", "", $ret);
        return $ret;
    }

    /**
     * @param $summoner Summoner
     * @return string
     */
    public static function getProfileIconURL($summoner){
        return Constants::DDRAGON_BASE_PATH.'cdn/'.Constants::getDDragonVersion().'/img/profileicon/'.$summoner->getProfileIcon().'.png';
    }

    /**
     * @param $championId int
     * @return string
     */
    public static function getChampionIconURL($championId){
        return Constants::DDRAGON_BASE_PATH . "cdn/" . Constants::getDDragonVersion() . "/img/champion/" . Utils::getChampWithoutSpecials(Champions::getChampion($championId)->getName()) . ".png";
    }

    /**
     * @param $rune Rune|RuneStat|RuneStyle
     * @return string
     */
    public static function getRuneIconURL($rune){
        return Constants::DDRAGON_BASE_PATH.'cdn/img/'.$rune->getIconPath();
    }
}