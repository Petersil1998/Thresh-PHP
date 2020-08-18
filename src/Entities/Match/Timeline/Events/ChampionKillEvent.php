<?php


namespace src\Entities\Match\Timeline\Events;


class ChampionKillEvent extends AbstractTimelineEvent
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
     * @var int
     */
    private $victimId;

    /**
     * @var int[]
     */
    private $assistingIds;

    /**
     * ChampionKillEvent constructor.
     * @param $timestamp int
     * @param $positionX int
     * @param $positionY int
     * @param $killerId int
     * @param $victimId int
     * @param $assistingIds int[]
     */
    public function __construct($timestamp, $positionX, $positionY, $killerId, $victimId, $assistingIds)
    {
        parent::__construct($timestamp, TimelineEvent::CHAMPION_KILL);
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->killerId = $killerId;
        $this->victimId = $victimId;
        $this->assistingIds = $assistingIds;
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
     * @return int
     */
    public function getVictimId(): int
    {
        return $this->victimId;
    }

    /**
     * @return int[]
     */
    public function getAssistingIds(): array
    {
        return $this->assistingIds;
    }
}