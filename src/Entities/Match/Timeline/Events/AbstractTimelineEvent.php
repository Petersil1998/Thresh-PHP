<?php

namespace Thresh\Entities\Match\Timeline\Events;

/**
 * Class AbstractTimelineEvent
 * @package Thresh\Entities\Match\Timeline\Events
 */
abstract class AbstractTimelineEvent
{
    /**
     * @var int
     */
    protected $timestamp;

    /**
     * @var string
     */
    protected $type;

    /**
     * AbstractTimelineEvent constructor.
     * @param int $timestamp
     * @param string $type
     */
    protected function __construct(int $timestamp, string $type)
    {
        $this->timestamp = $timestamp;
        $this->type = $type;
    }

    /**
     * Returns the Timestamp of the Event
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }
    /**
     * Returns the Type of the Event
     * @see TimelineEvents
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}