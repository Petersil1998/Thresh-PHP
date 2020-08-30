<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Item;
use Thresh\Entities\Match\Timeline\TimelineParticipant;

class ItemUndoEvent extends AbstractTimelineEvent
{
    /**
     * @var TimelineParticipant
     */
    private $participant;

    /**
     * @var Item
     */
    private $after;

    /**
     * @var Item
     */
    private $before;

    /**
     * ItemUndoEvent constructor.
     * @param $timestamp int
     * @param $participant TimelineParticipant
     * @param $after Item
     * @param $before Item
     */
    public function __construct($timestamp, $participant, $after, $before)
    {
        parent::__construct($timestamp, TimelineEvents::ITEM_UNDO);
        $this->participant = $participant;
        $this->after = $after;
        $this->before = $before;
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
    public function getAfter(): Item
    {
        return $this->after;
    }

    /**
     * @return Item
     */
    public function getBefore(): Item
    {
        return $this->before;
    }
}