<?php

namespace Thresh\Entities\Summoner;

/**
 * This class represents a Champion Mastery belonging to a specific Summoner
 * @package Thresh\Entities\Summoner
 */
class ChampionMastery
{
    /**
     * @var bool
     */
    private $chestGranted;

    /**
     * @var int
     */
    private $championLevel;

    /**
     * @var int
     */
    private $championPoints;

    /**
     * @var int
     */
    private $championId;

    /**
     * @var int
     */
    private $championPointsUntilNextLevel;

    /**
     * @var int
     */
    private $lastPlayTime;

    /**
     * @var int
     */
    private $tokensEarned;

    /**
     * @var int
     */
    private $championPointsSinceLastLevel;

    /**
     * ChampionMastery constructor.
     * @param $data mixed
     */
    public function __construct($data)
    {
        $this->chestGranted = $data->chestGranted;
        $this->championLevel = $data->championLevel;
        $this->championPoints = $data->championPoints;
        $this->championId = $data->championId;
        $this->championPointsUntilNextLevel = $data->championPointsUntilNextLevel;
        $this->lastPlayTime = $data->lastPlayTime;
        $this->tokensEarned = $data->tokensEarned;
        $this->championPointsSinceLastLevel = $data->championPointsSinceLastLevel;
    }

    /**
     * @return bool
     */
    public function isChestGranted()
    {
        return $this->chestGranted;
    }

    /**
     * @return int
     */
    public function getChampionLevel()
    {
        return $this->championLevel;
    }

    /**
     * @return int
     */
    public function getChampionPoints()
    {
        return $this->championPoints;
    }

    /**
     * @return int
     */
    public function getChampionId()
    {
        return $this->championId;
    }

    /**
     * @return int
     */
    public function getChampionPointsUntilNextLevel()
    {
        return $this->championPointsUntilNextLevel;
    }

    /**
     * @return int
     */
    public function getLastPlayTime()
    {
        return $this->lastPlayTime;
    }

    /**
     * @return int
     */
    public function getTokensEarned()
    {
        return $this->tokensEarned;
    }

    /**
     * @return int
     */
    public function getChampionPointsSinceLastLevel()
    {
        return $this->championPointsSinceLastLevel;
    }
}