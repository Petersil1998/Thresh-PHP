<?php

namespace src\Entities\Match;

class Team
{
    /**
     * @var int
     */
    private $teamId;

    /**
     * @var bool
     */
    private $win;

    /**
     * @var bool
     */
    private $firstBlood;

    /**
     * @var bool
     */
    private $firstTower;

    /**
     * @var bool
     */
    private $firstInhibitor;

    /**
     * @var bool
     */
    private $firstBaron;

    /**
     * @var bool
     */
    private $firstDragon;

    /**
     * @var bool
     */
    private $firstRiftHerald;

    /**
     * @var int
     */
    private $towerKills;

    /**
     * @var int
     */
    private $inhibitorKills;

    /**
     * @var int
     */
    private $baronKills;

    /**
     * @var int
     */
    private $dragonKills;

    /**
     * @var int
     */
    private $vilemawKills;

    /**
     * @var int
     */
    private $riftHeraldKills;

    /**
     * @var int
     */
    private $dominionVictoryScore;

    /**
     * @var array
     */
    private $bans;

    public function __construct($team)
    {
        $this->teamId = $team->teamId;
        $this->win = $team->win === 'Win';
        $this->firstBlood = $team->firstBlood;
        $this->firstTower = $team->firstTower;
        $this->firstInhibitor = $team->firstInhibitor;
        $this->firstBaron = $team->firstBaron;
        $this->firstDragon = $team->firstDragon;
        $this->firstRiftHerald = $team->firstRiftHerald;
        $this->towerKills = $team->towerKills;
        $this->inhibitorKills = $team->inhibitorKills;
        $this->baronKills = $team->baronKills;
        $this->dragonKills = $team->dragonKills;
        $this->vilemawKills = $team->vilemawKills;
        $this->riftHeraldKills = $team->riftHeraldKills;
        $this->dominionVictoryScore = $team->dominionVictoryScore;
        $bans = array();
        foreach ($team->bans as $ban){
            $bans[$ban->pickTurn] = $ban->championId;
        }
        $this->bans = $bans;
    }
}