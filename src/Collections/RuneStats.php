<?php

namespace Thresh\Collections;

use Thresh\Entities\Runes\RuneStat;

/**
 * This class represents a collection of RuneStats
 * @see RuneStat
 * @package Thresh\Collections
 */
class RuneStats
{
    /**
     * @var RuneStat[]
     */
    private static $runeStats;

    /**
     * This Method returns the **RuneStat** object with the specified ID.
     * If no RuneStat with the specified ID was found returns **false**
     * @param $id int RuneStat ID
     * @return false|RuneStat
     */
    public static function getRuneStat($id){
        foreach (self::$runeStats as $runeStat){
            if($runeStat->getId() == $id){
                return $runeStat;
            }
        }
        return false;
    }

    /**
     * This Method returns an array containing all RuneStats
     * @return RuneStat[]
     */
    public static function getRuneStats(): array
    {
        return self::$runeStats;
    }

    /**
     * Used to set the list of RuneStats (**Do not use it!**)
     * @param RuneStat[] $runeStats
     */
    public static function setRuneStats(array $runeStats): void
    {
        self::$runeStats = $runeStats;
    }
}