<?php


namespace src\Entities\Match\Timeline\Events;


class WardKillEvent extends AbstractTimelineEvent
{
    /**
     * @var string
     */
    private $wardType;

    /**
     * @var int
     */
    private $killerId;

    public function __construct($timestamp, $wardType, $killerId)
    {
        parent::__construct($timestamp, TimelineEvent::WARD_KILL);
        $this->wardType = $wardType;
        $this->killerId = $killerId;
    }

    /**
     * @return string
     */
    public function getWardType(): string
    {
        return $this->wardType;
    }

    /**
     * @return int
     */
    public function getKillerId(): int
    {
        return $this->killerId;
    }
}