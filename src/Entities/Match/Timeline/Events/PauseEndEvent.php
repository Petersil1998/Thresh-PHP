<?php

namespace Thresh\Entities\Match\Timeline\Events;

class PauseEndEvent extends AbstractTimelineEvent
{
    /**
     * @param int $timestamp
     */
    public function __construct(int $timestamp) {
        parent::__construct($timestamp, TimelineEvents::PAUSE_END);
    }
}