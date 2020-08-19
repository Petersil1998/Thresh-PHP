<?php

namespace src\Entities\Summoner;

use stdClass;

class Rank
{

    /**
     * @var string
     */
    private $leagueId = "";

    /**
     * @var string
     */
    private $queueType = "";

    /**
     * @var string
     */
    private $tier = "";

    /**
     * @var string
     */
    private $rank = "";

    /**
     * @var int
     */
    private $leaguePoints = 0;

    /**
     * @var int
     */
    private $wins = 0;

    /**
     * @var int
     */
    private $losses = 0;

    /**
     * @var bool
     */
    private $veteran = false;

    /**
     * @var bool
     */
    private $inactive = false;

    /**
     * @var bool
     */
    private $freshBlood = false;

    /**
     * @var bool
     */
    private $hotStreak = false;

    /**
     * Rank constructor.
     * @param stdClass|string $rankObj
     */
    public function __construct($rankObj)
    {
        if($rankObj != 'Unranked') {
            $this->leagueId = $rankObj->leagueId;
            $this->queueType = $rankObj->queueType;
            $this->tier = $rankObj->tier;
            $this->rank = $rankObj->rank;
            $this->leaguePoints = $rankObj->leaguePoints;
            $this->wins = $rankObj->wins;
            $this->losses = $rankObj->losses;
            $this->veteran = $rankObj->veteran;
            $this->inactive = $rankObj->inactive;
            $this->freshBlood = $rankObj->freshBlood;
            $this->hotStreak = $rankObj->hotStreak;
        } else {
            $this->tier = $rankObj;
        }
    }

    /**
     * @return string
     */
    public function getLeagueId()
    {
        return $this->leagueId;
    }

    /**
     * @return string
     */
    public function getQueueType()
    {
        return $this->queueType;
    }

    /**
     * @return string
     */
    public function getTier()
    {
        return $this->tier;
    }

    /**
     * @return string
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @return int
     */
    public function getLeaguePoints()
    {
        return $this->leaguePoints;
    }

    /**
     * @return int
     */
    public function getWins()
    {
        return $this->wins;
    }

    /**
     * @return int
     */
    public function getLosses()
    {
        return $this->losses;
    }

    /**
     * @return bool
     */
    public function isVeteran()
    {
        return $this->veteran;
    }

    /**
     * @return bool
     */
    public function isInactive()
    {
        return $this->inactive;
    }

    /**
     * @return bool
     */
    public function isFreshBlood()
    {
        return $this->freshBlood;
    }

    /**
     * @return bool
     */
    public function isHotStreak()
    {
        return $this->hotStreak;
    }
}