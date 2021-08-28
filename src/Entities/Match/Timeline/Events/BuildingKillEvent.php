<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Match\Timeline\TimelineParticipant;

class BuildingKillEvent extends AbstractTimelineEvent
{

    /**
     * @var int
     */
    private $positionX;

    /**
     * @var int
     */
    private $positionY;

    /**
     * @var TimelineParticipant|null
     */
    private $killer;

    /**
     * @var TimelineParticipant[]
     */
    private $assists;

    /**
     * @var int
     */
    private $teamId;

    /**
     * @var string
     */
    private $buildingType;

    /**
     * @var string
     */
    private $laneType;

    /**
     * @var string
     */
    private $towerType;

    /**
     * BuildingKillEvent constructor.
     * @param int $timestamp
     * @param int $positionX
     * @param int $positionY
     * @param TimelineParticipant|null $killer
     * @param TimelineParticipant[] $assists
     * @param int $teamId
     * @param string $buildingType
     * @param string $laneType
     * @param string $towerType
     */
    public function __construct(int $timestamp, int $positionX, int $positionY, ?TimelineParticipant $killer, array $assists, int $teamId, string $buildingType, string $laneType, string $towerType)
    {
        parent::__construct($timestamp, TimelineEvents::BUILDING_KILL);
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->killer = $killer;
        $this->assists = $assists;
        $this->teamId = $teamId;
        $this->buildingType = $buildingType;
        $this->laneType = $laneType;
        $this->towerType = $towerType;
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
     * @return TimelineParticipant|null
     */
    public function getKiller(): ?TimelineParticipant
    {
        return $this->killer;
    }

    /**
     * @return TimelineParticipant[]
     */
    public function getAssists(): array
    {
        return $this->assists;
    }

    /**
     * @return int
     */
    public function getTeamId(): int
    {
        return $this->teamId;
    }

    /**
     * @return string
     */
    public function getBuildingType(): string
    {
        return $this->buildingType;
    }

    /**
     * @return string
     */
    public function getLaneType(): string
    {
        return $this->laneType;
    }

    /**
     * @return string
     */
    public function getTowerType(): string
    {
        return $this->towerType;
    }
}