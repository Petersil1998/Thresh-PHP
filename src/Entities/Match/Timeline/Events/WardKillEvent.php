<?php


namespace src\Entities\Match\Timeline\Events;


use src\Entities\Match\Timeline\TimelineParticipant;

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
     * @param $timestamp int
     * @param $wardType string
     * @param $killer TimelineParticipant
     */
    public function __construct($timestamp, $wardType, $killer)
    {
        parent::__construct($timestamp, TimelineEvent::WARD_KILL);
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