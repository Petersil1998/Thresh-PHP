<?php

namespace Thresh\Collections;

use Thresh\Entities\Champions\Champion;

/**
 * This class represents a collection of Champions
 * @see Champion
 * @package Thresh\Collections
 */
class Champions
{
    /**
     * @var Champion[]
     */
    private static $champions;

    /**
     * This Method returns the **Champion** object with the specified ID.
     * If no Champion with the specified ID was found returns **false**
     * @param $id int Champion ID
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
     * This Method returns the **Champion** object with the specified Name.
     * If no Champion with the specified Name was found returns **false**
     * @param $name string Champion Name
     * @return false|Champion
     */
    public static function getChampionByName($name){
        foreach (self::$champions as $champion){
            if(strtolower($champion->getName()) === strtolower($name)){
                return $champion;
            }
        }
        return false;
    }

    /**
     * This Method returns an array containing all Champions
     * @return Champion[]
     */
    public static function getChampions(): array
    {
        return self::$champions;
    }

    /**
     * Used to set the list of Champions (**Do not use it!**)
     * @param Champion[] $champions
     */
    public static function setChampions(array $champions): void
    {
        self::$champions = $champions;
    }
}