<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Match\Timeline\TimelineParticipant;

class ItemUndoEvent extends AbstractTimelineEvent
{
    /**
     * @var TimelineParticipant
     */
    private $participant;

    /**
     * @var int
     */
    private $afterId;

    /**
     * @var int
     */
    private $beforeId;

    /**
     * ItemUndoEvent constructor.
     * @param $timestamp int
     * @param $participant TimelineParticipant
     * @param $afterId int
     * @param $beforeId int
     */
    public function __construct($timestamp, $participant, $afterId, $beforeId)
    {
        parent::__construct($timestamp, TimelineEvents::ITEM_UNDO);
        $this->participant = $participant;
        $this->afterId = $afterId;
        $this->beforeId = $beforeId;
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
    public function getAfterId(): int
    {
        return $this->afterId;
    }

    /**
     * @return int
     */
    public function getBeforeId(): int
    {
        return $this->beforeId;
    }
}