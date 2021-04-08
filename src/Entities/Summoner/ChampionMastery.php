<?php

namespace Thresh\Entities\Summoner;

use stdClass;
use Thresh_Core\Collections\Champions;
use Thresh_Core\Objects\Champions\Champion;

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
     * @var Champion
     */
    private $champion;

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
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->chestGranted = $data->chestGranted;
        $this->championLevel = $data->championLevel;
        $this->championPoints = $data->championPoints;
        $this->champion = Champions::getChampion($data->championId);
        $this->championPointsUntilNextLevel = $data->championPointsUntilNextLevel;
        $this->lastPlayTime = $data->lastPlayTime;
        $this->tokensEarned = $data->tokensEarned;
        $this->championPointsSinceLastLevel = $data->championPointsSinceLastLevel;
    }

    /**
     * @return bool
     */
    public function isChestGranted(): bool
    {
        return $this->chestGranted;
    }

    /**
     * @return int
     */
    public function getChampionLevel(): int
    {
        return $this->championLevel;
    }

    /**
     * @return int
     */
    public function getChampionPoints(): int
    {
        return $this->championPoints;
    }

    /**
     * @return Champion
     */
    public function getChampion(): Champion
    {
        return $this->champion;
    }

    /**
     * @return int
     */
    public function getChampionPointsUntilNextLevel(): int
    {
        return $this->championPointsUntilNextLevel;
    }

    /**
     * @return int
     */
    public function getLastPlayTime(): int
    {
        return $this->lastPlayTime;
    }

    /**
     * @return int
     */
    public function getTokensEarned(): int
    {
        return $this->tokensEarned;
    }

    /**
     * @return int
     */
    public function getChampionPointsSinceLastLevel(): int
    {
        return $this->championPointsSinceLastLevel;
    }
}