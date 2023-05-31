<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Match\Timeline\TimelineParticipant;

class LevelUpEvent extends AbstractTimelineEvent
{

    /**
     * @var int
     */
    private $level;

    /**
     * @var TimelineParticipant
     */
    private $participant;

    /**
     * @param int $timestamp
     * @param int $level
     * @param TimelineParticipant $participant
     */
    public function __construct(int $timestamp, int $level, TimelineParticipant $participant)
    {
        parent::__construct($timestamp, TimelineEvents::LEVEL_UP);
        $this->level = $level;
        $this->participant = $participant;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @return TimelineParticipant
     */
    public function getParticipant(): TimelineParticipant
    {
        return $this->participant;
    }
}