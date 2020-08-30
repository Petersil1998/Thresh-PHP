<?php

namespace Thresh\Collections;

use Thresh\Entities\Map;

/**
 * This class represents a collection of Maps
 * @see Map
 * @package Thresh\Collections
 */
class Maps
{
    /**
     * @var Map[]
     */
    private static $maps;

    /**
     * This Method returns the **Map** object with the specified ID.
     * If no Map with the specified ID was found returns **false**
     * @param $id int Map ID
     * @return false|Map
     */
    public static function getMap($id){
        foreach (self::$maps as $map){
            if($map->getId() == $id){
                return $map;
            }
        }
        return false;
    }

    /**
     * This Method returns an array containing all Maps
     * @return Map[]
     */
    public static function getMaps(): array
    {
        return self::$maps;
    }

    /**
     * Used to set the list of Maps (**Do not use it!**)
     * @param Map[] $maps
     */
    public static function setMaps(array $maps): void
    {
        self::$maps = $maps;
    }
}