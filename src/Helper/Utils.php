<?php

namespace Thresh\Helper;

use Thresh\Collections\Champions;
use Thresh\Constants\Constants;
use Thresh\Entities\Champions\Champion;
use Thresh\Entities\Runes\Rune;
use Thresh\Entities\Runes\RuneStat;
use Thresh\Entities\Runes\RuneStyle;
use Thresh\Entities\Sprite;
use Thresh\Entities\Summoner\Summoner;

/**
 * This Class holds some Utility Methods
 * @package Thresh\Helper
 */
class Utils
{
    /**
     * This Method returns the URL for the Summoner Profile Icon
     * @param $summoner Summoner
     * @return string
     */
    public static function getProfileIconURL($summoner){
        return Constants::DDRAGON_BASE_PATH.'cdn/'.Constants::getDataDragonVersion().'/img/profileicon/'.$summoner->getProfileIcon().'.png';
    }
}