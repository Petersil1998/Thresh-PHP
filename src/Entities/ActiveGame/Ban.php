<?php

namespace Thresh\Entities\ActiveGame;

use Thresh\Entities\Champions\Champion;

/**
 * Class Ban represents a Ban in a running game
 * @package Thresh\Entities\ActiveGame
 */
class Ban
{
    /**
     * @var Champion
     */
    private $champion;

    /**
     * @var int
     */
    private $teamId;

    /**
     * @var int
     */
    private $pickTurn;

    /**
     * Ban constructor.
     * @param Champion $champion
     * @param int $teamId
     * @param int $pickTurn
     */
    public function __construct(Champion $champion, int $teamId, int $pickTurn)
    {
        $this->champion = $champion;
        $this->teamId = $teamId;
        $this->pickTurn = $pickTurn;
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
    public function getTeamId(): int
    {
        return $this->teamId;
    }

    /**
     * @return int
     */
    public function getPickTurn(): int
    {
        return $this->pickTurn;
    }
}