<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Match\Team;
use Thresh\Entities\Match\Timeline\TimelineParticipant;

class TurretPlateDestroyedEvent extends AbstractTimelineEvent
{
    /**
     * @var TimelineParticipant|null
     */
    private $killer;

    /**
     * @var string
     */
    private $laneType;

    /**
     * @var int
     */
    private $positionX;

    /**
     * @var int
     */
    private $positionY;

    /**
     * @var Team
     */
    private $team;

    /**
     * @param int $timestamp
     * @param TimelineParticipant|null $killer
     * @param string $laneType
     * @param int $positionX
     * @param int $positionY
     * @param Team $team
     */
    public function __construct(int $timestamp, ?TimelineParticipant $killer, string $laneType, int $positionX, int $positionY, Team $team)
    {
        parent::__construct($timestamp, TimelineEvents::TURRET_PLATE_DESTROYED);
        $this->killer = $killer;
        $this->laneType = $laneType;
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->team = $team;
    }

    /**
     * @return TimelineParticipant|null
     */
    public function getKiller(): ?TimelineParticipant
    {
        return $this->killer;
    }

    /**
     * @return string
     */
    public function getLaneType(): string
    {
        return $this->laneType;
    }

    /**
     * @return int
     */
    public function getPositionX(): int
    {
        return $this->positionX;
    }

    /**
     * @return int
     */
    public function getPositionY(): int
    {
        return $this->positionY;
    }

    /**
     * @return Team
     */
    public function getTeam(): Team
    {
        return $this->team;
    }
}