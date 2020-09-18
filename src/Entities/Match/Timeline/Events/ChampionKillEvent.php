<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Match\Timeline\TimelineParticipant;

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
     * @param int $timestamp
     * @param int $positionX
     * @param int $positionY
     * @param TimelineParticipant $killer
     * @param TimelineParticipant $victim
     * @param TimelineParticipant[] $assists
     */
    public function __construct(int $timestamp, int $positionX, int $positionY, TimelineParticipant $killer, TimelineParticipant $victim, array $assists)
    {
        parent::__construct($timestamp, TimelineEvents::CHAMPION_KILL);
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