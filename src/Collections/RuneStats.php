<?php

namespace src\Collections;

use src\Entities\Runes\RuneStat;

class RuneStats
{
    /**
     * @var RuneStat[]
     */
    private static $runeStats;

    /**
     * @param $id int
     * @return false|RuneStat
     */
    public static function getRuneStat($id){
        foreach (self::$runeStats as $runeStat){
            if($runeStat->getId() === $id){
                return $runeStat;
            }
        }
        return false;
    }

    /**
     * @return RuneStat[]
     */
    public static function getRuneStats(): array
    {
        return self::$runeStats;
    }

    /**
     * @param RuneStat[] $runeStats
     */
    public static function setRuneStats(array $runeStats): void
    {
        self::$runeStats = $runeStats;
    }
}