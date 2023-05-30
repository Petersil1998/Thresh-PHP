<?php

namespace Thresh\Entities\Match;

use stdClass;
use Thresh_Core\Collections\Champions;

/**
 * This Class represents a Team in a Match
 * @package Thresh\Entities\Match
 */
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
    private $championKills;

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
    private $riftHeraldKills;

    /**
     * @var array
     */
    private $bans;

    /**
     * Team constructor.
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->teamId = $data->teamId;
        $this->win = $data->win === 'Win';
        $this->firstBaron = $data->objectives->baron->first;
        $this->baronKills = $data->objectives->baron->kills;
        $this->firstBlood = $data->objectives->champion->first;
        $this->championKills = $data->objectives->champion->kills;
        $this->firstDragon = $data->objectives->dragon->first;
        $this->dragonKills = $data->objectives->dragon->kills;
        $this->firstInhibitor = $data->objectives->inhibitor->first;
        $this->inhibitorKills = $data->objectives->inhibitor->kills;
        $this->firstRiftHerald = $data->objectives->riftHerald->first;
        $this->riftHeraldKills = $data->objectives->riftHerald->kills;
        $this->firstTower = $data->objectives->tower->first;
        $this->towerKills = $data->objectives->tower->kills;
        $bans = array();
        foreach ($data->bans as $ban){
            $bans[$ban->pickTurn] = Champions::getChampion($ban->championId);
        }
        $this->bans = $bans;
    }

    /**
     * @return int
     */
    public function getTeamId(): int
    {
        return $this->teamId;
    }

    /**
     * @return bool
     */
    public function hasWon(): bool
    {
        return $this->win;
    }

    /**
     * @return bool
     */
    public function hasFirstBlood(): bool
    {
        return $this->firstBlood;
    }

    /**
     * @return bool
     */
    public function hasFirstTower(): bool
    {
        return $this->firstTower;
    }

    /**
     * @return bool
     */
    public function hasFirstInhibitor(): bool
    {
        return $this->firstInhibitor;
    }

    /**
     * @return bool
     */
    public function hasFirstBaron(): bool
    {
        return $this->firstBaron;
    }

    /**
     * @return bool
     */
    public function hasFirstDragon(): bool
    {
        return $this->firstDragon;
    }

    /**
     * @return bool
     */
    public function hasFirstRiftHerald(): bool
    {
        return $this->firstRiftHerald;
    }

    /**
     * @return int
     */
    public function getChampionKills(): int
    {
        return $this->championKills;
    }

    /**
     * @return int
     */
    public function getTowerKills(): int
    {
        return $this->towerKills;
    }

    /**
     * @return int
     */
    public function getInhibitorKills(): int
    {
        return $this->inhibitorKills;
    }

    /**
     * @return int
     */
    public function getBaronKills(): int
    {
        return $this->baronKills;
    }

    /**
     * @return int
     */
    public function getDragonKills(): int
    {
        return $this->dragonKills;
    }

    /**
     * @return int
     */
    public function getVilemawKills(): int
    {
        return $this->vilemawKills;
    }

    /**
     * @return int
     */
    public function getRiftHeraldKills(): int
    {
        return $this->riftHeraldKills;
    }

    /**
     * @return int
     */
    public function getDominionVictoryScore(): int
    {
        return $this->dominionVictoryScore;
    }

    /**
     * Returns the Bans as a associative array with key being the pick Turn and value the actual Champion
     * @return array
     */
    public function getBans(): array
    {
        return $this->bans;
    }
}