<?php


namespace src\Entities\Match\Timeline\Events;


use src\Entities\Match\Timeline\TimelineParticipant;

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
     * @var TimelineParticipant
     */
    private $killer;

    /**
     * @var TimelineParticipant
     */
    private $victim;

    /**
     * @var TimelineParticipant[]
     */
    private $assists;

    /**
     * ChampionKillEvent constructor.
     * @param $timestamp int
     * @param $positionX int
     * @param $positionY int
     * @param $killer TimelineParticipant
     * @param $victim TimelineParticipant
     * @param $assists TimelineParticipant[]
     */
    public function __construct($timestamp, $positionX, $positionY, $killer, $victim, $assists)
    {
        parent::__construct($timestamp, TimelineEvent::CHAMPION_KILL);
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->killer = $killer;
        $this->victim = $victim;
        $this->assists = $assists;
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
     * @return TimelineParticipant
     */
    public function getVictim(): TimelineParticipant
    {
        return $this->victim;
    }

    /**
     * @return TimelineParticipant[]
     */
    public function getAssists(): array
    {
        return $this->assists;
    }
}