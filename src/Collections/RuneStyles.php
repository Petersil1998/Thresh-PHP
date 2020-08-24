<?php

namespace Thresh\Collections;

use Thresh\Entities\Runes\RuneStyle;

class RuneStyles
{
    /**
     * @var RuneStyle[]
     */
    private static $runeStyles;

    /**
     * @param $id int
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
     * @return RuneStyle[]
     */
    public static function getRuneStyles(): array
    {
        return self::$runeStyles;
    }

    /**
     * @param RuneStyle[] $runeStyles
     */
    public static function setRuneStyles(array $runeStyles): void
    {
        self::$runeStyles = $runeStyles;
    }
}