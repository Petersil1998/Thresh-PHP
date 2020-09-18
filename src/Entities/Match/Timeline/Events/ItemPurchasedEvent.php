<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Match\Timeline\TimelineParticipant;
use Thresh_Core\Objects\Item;

class ItemPurchasedEvent extends AbstractTimelineEvent
{
    /**
     * @var TimelineParticipant
     */
    private $participant;

    /**
     * @var Item
     */
    private $item;

    /**
     * ItemPurchasedEvent constructor.
     * @param int $timestamp
     * @param TimelineParticipant $participant
     * @param Item $item
     */
    public function __construct(int $timestamp, TimelineParticipant $participant, Item $item)
    {
        parent::__construct($timestamp, TimelineEvents::ITEM_PURCHASED);
        $this->participant = $participant;
        $this->item = $item;
    }

    /**
     * @return TimelineParticipant
     */
    public function getParticipant(): TimelineParticipant
    {
        return $this->participant;
    }

    /**
     * @return Item
     */
    public function getItem(): Item
    {
        return $this->item;
    }
}