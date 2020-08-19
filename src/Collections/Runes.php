<?php


namespace src\Collections;


use src\Entities\Runes\Rune;

class Runes
{
    /**
     * @var Rune[]
     */
    private static $runes;

    /**
     * @param $id int
     * @return false|Rune
     */
    public static function getRune($id){
        foreach (self::$runes as $rune){
            if($rune->getId() === $id){
                return $rune;
            }
        }
        return false;
    }

    /**
     * @return Rune[]
     */
    public static function getRunes(): array
    {
        return self::$runes;
    }

    /**
     * @param Rune[] $runes
     */
    public static function setRunes(array $runes): void
    {
        self::$runes = $runes;
    }
}