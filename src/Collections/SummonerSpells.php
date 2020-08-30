<?php


namespace Thresh\Collections;


use Thresh\Entities\SummonerSpell;

/**
 * This class represents the collection of all Summoner Spells
 * @see SummonerSpell
 * @package Thresh\Collections
 */
class SummonerSpells
{
    /**
     * @var SummonerSpell[]
     */
    private static $summonerSpells;

    /**
     * This Method returns the **SummonerSpell** object with the specified ID.
     * If no Summoner Spell with the specified ID was found returns **false**
     * @param $id int Summoner Spell ID
     * @return false|SummonerSpell
     */
    public static function getSummonerSpell($id){
        foreach (self::$summonerSpells as $summonerSpell){
            if($summonerSpell->getId() == $id){
                return $summonerSpell;
            }
        }
        return false;
    }

    /**
     * This Method returns an array containing all Summoner Spells
     * @return SummonerSpell[]
     */
    public static function getSummonerSpells(): array
    {
        return self::$summonerSpells;
    }

    /**
     * Used to set the list of Summoner Spells (**Do not use it!**)
     * @param SummonerSpell[] $summonerSpells
     */
    public static function setSummonerSpells(array $summonerSpells): void
    {
        self::$summonerSpells = $summonerSpells;
    }
}