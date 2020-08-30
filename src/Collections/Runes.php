<?php

namespace Thresh\Collections;

use Thresh\Entities\Runes\Rune;

/**
 * This class represents a collection of Runes
 * @see Rune
 * @package Thresh\Collections
 */
class Runes
{
    /**
     * @var Rune[]
     */
    private static $runes;

    /**
     * This Method returns the **Rune** object with the specified ID.
     * If no Rune with the specified ID was found returns **false**
     * @param $id int Rune ID
     * @return false|Rune
     */
    public static function getRune($id){
        foreach (self::$runes as $rune){
            if($rune->getId() == $id){
                return $rune;
            }
        }
        return false;
    }

    /**
     * This Method returns an array containing all Runes
     * @return Rune[]
     */
    public static function getRunes(): array
    {
        return self::$runes;
    }

    /**
     * Used to set the list of Runes (**Do not use it!**)
     * @param Rune[] $runes
     */
    public static function setRunes(array $runes): void
    {
        self::$runes = $runes;
    }
}