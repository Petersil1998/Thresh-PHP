<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Item;
use Thresh\Entities\Match\Timeline\TimelineParticipant;

class ItemSoldEvent extends AbstractTimelineEvent
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
     * ItemSoldEvent constructor.
     * @param $timestamp int
     * @param $participant TimelineParticipant
     * @param $item Item
     */
    public function __construct($timestamp, $participant, $item)
    {
        parent::__construct($timestamp, TimelineEvents::ITEM_SOLD);
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