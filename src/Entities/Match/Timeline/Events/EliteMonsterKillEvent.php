<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Match\Timeline\TimelineParticipant;

class EliteMonsterKillEvent extends AbstractTimelineEvent
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
     * @var string
     */
    private $monsterType;

    /**
     * @var string|null
     */
    private $monsterSubType;

    /**
     * EliteMonsterKillEvent constructor.
     * @param int $timestamp
     * @param int $positionX
     * @param int $positionY
     * @param TimelineParticipant|null $killer
     * @param string $monsterType
     * @param string|null $monsterSubType
     */
    public function __construct(int $timestamp, int $positionX, int $positionY, ?TimelineParticipant $killer, string $monsterType, string $monsterSubType = null)
    {
        parent::__construct($timestamp, TimelineEvents::ELITE_MONSTER_KILL);
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->killer = $killer;
        $this->monsterType = $monsterType;
        $this->monsterSubType = $monsterSubType;
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
     * @return string
     */
    public function getMonsterType(): string
    {
        return $this->monsterType;
    }

    /**
     * @return string|null
     */
    public function getMonsterSubType(): ?string
    {
        return $this->monsterSubType;
    }
}