<?php

namespace Thresh\Collections;

use Thresh\Entities\Map;

class Maps
{
    /**
     * @var Map[]
     */
    private static $maps;

    /**
     * @param $id int
     * @return false|Map
     */
    public static function getMap($id){
        foreach (self::$maps as $map){
            if($map->getId() === $id){
                return $map;
            }
        }
        return false;
    }

    /**
     * @return Map[]
     */
    public static function getMaps(): array
    {
        return self::$maps;
    }

    /**
     * @param Map[] $maps
     */
    public static function setMaps(array $maps): void
    {
        self::$maps = $maps;
    }
}