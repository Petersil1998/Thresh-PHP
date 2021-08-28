<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Match\Team;

class GameEndEvent extends AbstractTimelineEvent
{

    /**
     * @var string
     */
    private $gameId;

    /**
     * @var Team
     */
    private $winningTeam;

    public function __construct(int $timestamp, string $gameId, Team $winningTeam)
    {
        parent::__construct($timestamp, TimelineEvents::GAME_END);
        $this->gameId = $gameId;
        $this->winningTeam = $winningTeam;
    }

    /**
     * @return string
     */
    public function getGameId(): string
    {
        return $this->gameId;
    }

    /**
     * @return Team
     */
    public function getWinningTeam(): Team
    {
        return $this->winningTeam;
    }
}