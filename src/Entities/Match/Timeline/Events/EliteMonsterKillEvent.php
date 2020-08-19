<?php


namespace src\Entities\Match\Timeline\Events;


use src\Entities\Match\Timeline\TimelineParticipant;

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
     * @var TimelineParticipant
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
     * @param $timestamp int
     * @param $positionX int
     * @param $positionY int
     * @param $killer TimelineParticipant
     * @param $monsterType string
     * @param $monsterSubType string|null
     */
    public function __construct($timestamp, $positionX, $positionY, $killer, $monsterType, $monsterSubType = null)
    {
        parent::__construct($timestamp, TimelineEvent::ELITE_MONSTER_KILL);
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
     * @return TimelineParticipant
     */
    public function getKiller(): TimelineParticipant
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