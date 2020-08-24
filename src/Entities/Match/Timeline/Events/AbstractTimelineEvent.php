<?php

namespace Thresh\Entities\Match\Timeline\Events;

abstract class AbstractTimelineEvent
{
    /**
     * @var int
     */
    protected $timestamp;

    /**
     * @var TimelineEvents
     */
    protected $type;

    protected function __construct($timestamp, $type)
    {
        $this->timestamp = $timestamp;
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }
    /**
     * @return TimelineEvents
     */
    public function getType(): TimelineEvents
    {
        return $this->type;
    }
}