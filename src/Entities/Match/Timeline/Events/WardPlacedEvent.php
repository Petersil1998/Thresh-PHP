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
     * @var TimelineParticipant|null
     */
    private $creator;

    /**
     * WardPlacedEvent constructor.
     * @param int $timestamp
     * @param string $wardType
     * @param TimelineParticipant|null $creator
     */
    public function __construct(int $timestamp, string $wardType, ?TimelineParticipant $creator)
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
     * @return TimelineParticipant|null
     */
    public function getCreator(): ?TimelineParticipant
    {
        return $this->creator;
    }
}