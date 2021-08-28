<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Match\Timeline\TimelineParticipant;
use Thresh_Core\Objects\Item;

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
     * @var int
     */
    private $goldGain;

    /**
     * ItemUndoEvent constructor.
     * @param int $timestamp
     * @param TimelineParticipant $participant
     * @param Item $after
     * @param Item $before
     * @param int $goldGain
     */
    public function __construct(int $timestamp, TimelineParticipant $participant, Item $after, Item $before, int $goldGain)
    {
        parent::__construct($timestamp, TimelineEvents::ITEM_UNDO);
        $this->participant = $participant;
        $this->after = $after;
        $this->before = $before;
        $this->goldGain = $goldGain;
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

    /**
     * @return int
     */
    public function getGoldGain(): int
    {
        return $this->goldGain;
    }
}