<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Match\Timeline\TimelineParticipant;

class ChampionSpecialKillEvent extends AbstractTimelineEvent
{
    /**
     * @var string
     */
    private $killType;

    /**
     * @var TimelineParticipant
     */
    private $killer;

    /**
     * @var int
     */
    private $multiKillLength;

    /**
     * @var int
     */
    private $positionX;

    /**
     * @var int
     */
    private $positionY;

    /**
     * @param int $timestamp
     * @param string $killType
     * @param TimelineParticipant $killer
     * @param int $multiKillLength
     * @param int $positionX
     * @param int $positionY
     */
    public function __construct(int $timestamp, string $killType, TimelineParticipant $killer, int $multiKillLength, int $positionX, int $positionY)
    {
        parent::__construct($timestamp, TimelineEvents::CHAMPION_SPECIAL_KILL);
        $this->killType = $killType;
        $this->killer = $killer;
        $this->multiKillLength = $multiKillLength;
        $this->positionX = $positionX;
        $this->positionY = $positionY;
    }

    /**
     * @return string
     */
    public function getKillType(): string
    {
        return $this->killType;
    }

    /**
     * @return TimelineParticipant
     */
    public function getKiller(): TimelineParticipant
    {
        return $this->killer;
    }

    /**
     * @return int
     */
    public function getMultiKillLength(): int
    {
        return $this->multiKillLength;
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
}