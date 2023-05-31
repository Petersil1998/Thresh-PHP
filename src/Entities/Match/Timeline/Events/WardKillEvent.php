<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Match\Timeline\TimelineParticipant;

class WardKillEvent extends AbstractTimelineEvent
{
    /**
     * @var string
     */
    private $wardType;

    /**
     * @var TimelineParticipant
     */
    private $killer;

    /**
     * WardKillEvent constructor.
     * @param int $timestamp
     * @param string $wardType
     * @param TimelineParticipant $killer
     */
    public function __construct(int $timestamp, string $wardType, TimelineParticipant $killer)
    {
        parent::__construct($timestamp, TimelineEvents::WARD_KILL);
        $this->wardType = $wardType;
        $this->killer = $killer;
    }

    /**
     * @return string
     */
    public function getWardType(): string
    {
        return $this->wardType;
    }

    /**
     * @return TimelineParticipant
     */
    public function getKiller(): TimelineParticipant
    {
        return $this->killer;
    }
}