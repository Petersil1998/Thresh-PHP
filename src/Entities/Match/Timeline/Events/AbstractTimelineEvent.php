<?php


namespace src\Entities\Match\Timeline\Events;

abstract class AbstractTimelineEvent
{
    /**
     * @var int
     */
    protected $timestamp;

    /**
     * @var TimelineEvent
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
     * @return TimelineEvent
     */
    public function getType(): TimelineEvent
    {
        return $this->type;
    }
}