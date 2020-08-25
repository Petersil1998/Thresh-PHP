<?php

namespace Thresh\Collections;

use Thresh\Entities\Runes\RuneStyle;

/**
 * This class represents a collection of RuneStyles
 * @see RuneStyle
 * @package Thresh\Collections
 */
class RuneStyles
{
    /**
     * @var RuneStyle[]
     */
    private static $runeStyles;

    /**
     * This Method returns the **RuneStyle** object with the specified ID.
     * If no RuneStyle with the specified ID was found returns **false**
     * @param $id int RuneStyle ID
     * @return false|RuneStyle
     */
    public static function getRuneStyle($id){
        foreach (self::$runeStyles as $runeStyle){
            if($runeStyle->getId() === $id){
                return $runeStyle;
            }
        }
        return false;
    }

    /**
     * This Method returns an array containing all RuneStyles
     * @return RuneStyle[]
     */
    public static function getRuneStyles(): array
    {
        return self::$runeStyles;
    }

    /**
     * Used to set the list of RuneStyles (**Do not use it!**)
     * @param RuneStyle[] $runeStyles
     */
    public static function setRuneStyles(array $runeStyles): void
    {
        self::$runeStyles = $runeStyles;
    }
}