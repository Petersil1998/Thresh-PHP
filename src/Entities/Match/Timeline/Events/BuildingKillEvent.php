<?php


namespace src\Entities\Match\Timeline\Events;


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
     * @var int
     */
    private $killerId;

    /**
     * @var int[]
     */
    private $assistingIds;

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

    public function __construct($timestamp, $positionX, $positionY, $killerId, $assistingIds, $teamId, $buildingType, $laneType, $towerType)
    {
        parent::__construct($timestamp, TimelineEvent::BUILDING_KILL);
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->killerId = $killerId;
        $this->assistingIds = $assistingIds;
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
     * @return int
     */
    public function getKillerId(): int
    {
        return $this->killerId;
    }

    /**
     * @return int[]
     */
    public function getAssistingIds(): array
    {
        return $this->assistingIds;
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