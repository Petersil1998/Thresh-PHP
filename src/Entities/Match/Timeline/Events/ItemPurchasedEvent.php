<?php


namespace src\Entities\Match\Timeline\Events;


use src\Entities\Match\Timeline\TimelineParticipant;

class ItemPurchasedEvent extends AbstractTimelineEvent
{
    /**
     * @var TimelineParticipant
     */
    private $participant;

    /**
     * @var int
     */
    private $itemId;

    /**
     * ItemPurchasedEvent constructor.
     * @param $timestamp int
     * @param $participant TimelineParticipant
     * @param $itemId int
     */
    public function __construct($timestamp, $participant, $itemId)
    {
        parent::__construct($timestamp, TimelineEvent::ITEM_PURCHASED);
        $this->participant = $participant;
        $this->itemId = $itemId;
    }

    /**
     * @return TimelineParticipant
     */
    public function getParticipant(): TimelineParticipant
    {
        return $this->participant;
    }

    /**
     * @return int
     */
    public function getItemId(): int
    {
        return $this->itemId;
    }
}