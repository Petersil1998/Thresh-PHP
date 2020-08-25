<?php

namespace Thresh\Helper;

use Thresh\Collections\Champions;
use Thresh\Constants\Constants;
use Thresh\Entities\Runes\Rune;
use Thresh\Entities\Runes\RuneStat;
use Thresh\Entities\Runes\RuneStyle;
use Thresh\Entities\Summoner\Summoner;

/**
 * This Class holds some Utility Methods
 * @package Thresh\Helper
 */
class Utils
{
    /**
     * This Method returns the Champion Name as it is used in the Data Dragon
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
     * This Method returns the URL for the Summoner Profile Icon
     * @param $summoner Summoner
     * @return string
     */
    public static function getProfileIconURL($summoner){
        return Constants::DDRAGON_BASE_PATH.'cdn/'.Constants::getDataDragonVersion().'/img/profileicon/'.$summoner->getProfileIcon().'.png';
    }

    /**
     * This Method returns the URL for the Champion Icon
     * @param $championId int
     * @return string
     */
    public static function getChampionIconURL($championId){
        return Constants::DDRAGON_BASE_PATH . "cdn/" . Constants::getDataDragonVersion() . "/img/champion/" . Utils::getChampWithoutSpecials(Champions::getChampion($championId)->getName()) . ".png";
    }

    /**
     * This Method returns the URL for the Rune Icon
     * @param $rune Rune|RuneStat|RuneStyle
     * @return string
     */
    public static function getRuneIconURL($rune){
        return Constants::DDRAGON_BASE_PATH.'cdn/img/'.$rune->getIconPath();
    }
}