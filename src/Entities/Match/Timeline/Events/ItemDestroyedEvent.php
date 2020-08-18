<?php


namespace src\Entities\Match\Timeline\Events;


class ItemDestroyedEvent extends AbstractTimelineEvent
{
    /**
     * @var int
     */
    private $participantId;

    /**
     * @var int
     */
    private $itemId;

    public function __construct($timestamp, $participantId, $itemId)
    {
        parent::__construct($timestamp, TimelineEvent::ITEM_DESTROYED);
        $this->participantId = $participantId;
        $this->itemId = $itemId;
    }

    /**
     * @return int
     */
    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    /**
     * @return int
     */
    public function getItemId(): int
    {
        return $this->itemId;
    }
}