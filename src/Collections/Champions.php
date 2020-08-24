<?php

namespace Thresh\Collections;

use Thresh\Entities\Champions\Champion;

class Champions
{
    /**
     * @var Champion[]
     */
    private static $champions;

    /**
     * @param $id int
     * @return false|Champion
     */
    public static function getChampion($id){
        foreach (self::$champions as $champion){
            if($champion->getId() === $id){
                return $champion;
            }
        }
        return false;
    }

    /**
     * @return Champion[]
     */
    public static function getChampions(): array
    {
        return self::$champions;
    }

    /**
     * @param Champion[] $champions
     */
    public static function setChampions(array $champions): void
    {
        self::$champions = $champions;
    }
}