<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Match\Timeline\TimelineParticipant;

class WardPlacedEvent extends AbstractTimelineEvent
{

    /**
     * @var string
     */
    private $wardType;

    /**
     * @var TimelineParticipant
     */
    private $creator;

    /**
     * WardPlacedEvent constructor.
     * @param $timestamp int
     * @param $wardType string
     * @param $creator TimelineParticipant
     */
    public function __construct($timestamp, $wardType, $creator)
    {
        parent::__construct($timestamp, TimelineEvents::WARD_PLACED);
        $this->wardType = $wardType;
        $this->creator = $creator;
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
    public function getCreator(): TimelineParticipant
    {
        return $this->creator;
    }
}