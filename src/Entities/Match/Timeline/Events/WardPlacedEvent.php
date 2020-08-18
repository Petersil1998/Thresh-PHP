<?php


namespace src\Entities\Match\Timeline\Events;


class WardPlacedEvent extends AbstractTimelineEvent
{

    /**
     * @var string
     */
    private $wardType;

    /**
     * @var int
     */
    private $creatorId;

    public function __construct($timestamp, $wardType, $creatorId)
    {
        parent::__construct($timestamp, TimelineEvent::WARD_PLACED);
        $this->wardType = $wardType;
        $this->creatorId = $creatorId;
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
    public function getCreatorId(): int
    {
        return $this->creatorId;
    }
}