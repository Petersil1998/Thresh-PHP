<?php

namespace Thresh\Entities\Summoner;

use stdClass;

/**
 * This class represents a Specific Rank
 * @package Thresh\Entities\Summoner
 */
class Rank
{

    /**
     * @var string
     */
    protected $leagueId;

    /**
     * @var string
     */
    protected $queueType;

    /**
     * @var string
     */
    protected $tier;

    /**
     * @var string
     */
    protected $rank;

    /**
     * @var int
     */
    protected $leaguePoints;

    /**
     * @var int
     */
    protected $wins;

    /**
     * @var int
     */
    protected $losses;

    /**
     * @var bool
     */
    protected $veteran;

    /**
     * @var bool
     */
    protected $inactive;

    /**
     * @var bool
     */
    protected $freshBlood;

    /**
     * @var bool
     */
    protected $hotStreak;

    /**
     * Rank constructor.
     * @param stdClass|bool $data
     */
    public function __construct($data)
    {
        if($data) {
            $this->leagueId = $data->leagueId;
            $this->queueType = $data->queueType;
            $this->tier = $data->tier;
            $this->rank = $data->rank;
            $this->leaguePoints = $data->leaguePoints;
            $this->wins = $data->wins;
            $this->losses = $data->losses;
            $this->veteran = $data->veteran;
            $this->inactive = $data->inactive;
            $this->freshBlood = $data->freshBlood;
            $this->hotStreak = $data->hotStreak;
        }
    }

    /**
     * @return string
     */
    public function getLeagueId(): string
    {
        return $this->leagueId;
    }

    /**
     * @return string
     */
    public function getQueueType(): string
    {
        return $this->queueType;
    }

    /**
     * @return string
     */
    public function getTier(): string
    {
        return $this->tier;
    }

    /**
     * @return string
     */
    public function getRank(): string
    {
        return $this->rank;
    }

    /**
     * @return int
     */
    public function getLeaguePoints(): int
    {
        return $this->leaguePoints;
    }

    /**
     * @return int
     */
    public function getWins(): int
    {
        return $this->wins;
    }

    /**
     * @return int
     */
    public function getLosses(): int
    {
        return $this->losses;
    }

    /**
     * @return bool
     */
    public function isVeteran(): bool
    {
        return $this->veteran;
    }

    /**
     * @return bool
     */
    public function isInactive(): bool
    {
        return $this->inactive;
    }

    /**
     * @return bool
     */
    public function isFreshBlood(): bool
    {
        return $this->freshBlood;
    }

    /**
     * @return bool
     */
    public function isHotStreak(): bool
    {
        return $this->hotStreak;
    }
}