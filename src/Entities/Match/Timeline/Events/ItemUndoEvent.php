<?php


namespace src\Entities\Match\Timeline\Events;


class ItemUndoEvent extends AbstractTimelineEvent
{
    /**
     * @var int
     */
    private $participantId;

    /**
     * @var int
     */
    private $afterId;

    /**
     * @var int
     */
    private $beforeId;

    public function __construct($timestamp, $participantId, $afterId, $beforeId)
    {
        parent::__construct($timestamp, TimelineEvent::ITEM_UNDO);
        $this->participantId = $participantId;
        $this->afterId = $afterId;
        $this->beforeId = $beforeId;
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