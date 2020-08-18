<?php


namespace src\Entities\Match\Timeline\Events;


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
     * @var int
     */
    private $killerId;

    /**
     * @var string
     */
    private $monsterType;

    /**
     * @var string|null
     */
    private $monsterSubType;

    public function __construct($timestamp, $positionX, $positionY, $killerId, $monsterType, $monsterSubType = null)
    {
        parent::__construct($timestamp, TimelineEvent::ELITE_MONSTER_KILL);
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->killerId = $killerId;
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
     * @return int
     */
    public function getKillerId(): int
    {
        return $this->killerId;
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