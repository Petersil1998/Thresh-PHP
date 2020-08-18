<?php

namespace src\Entities\Summoner;

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
     * @param $championMastery mixed
     */
    public function __construct($championMastery)
    {
        $this->chestGranted = $championMastery->chestGranted;
        $this->championLevel = $championMastery->championLevel;
        $this->championPoints = $championMastery->championPoints;
        $this->championId = $championMastery->championId;
        $this->championPointsUntilNextLevel = $championMastery->championPointsUntilNextLevel;
        $this->lastPlayTime = $championMastery->lastPlayTime;
        $this->tokensEarned = $championMastery->tokensEarned;
        $this->championPointsSinceLastLevel = $championMastery->championPointsSinceLastLevel;
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