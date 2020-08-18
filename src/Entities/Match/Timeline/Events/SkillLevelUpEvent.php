<?php


namespace src\Entities\Match\Timeline\Events;


class SkillLevelUpEvent extends AbstractTimelineEvent
{

    /**
     * @var int
     */
    private $participantId;

    /**
     * @var int
     */
    private $skillSlot;

    /**
     * @var string
     */
    private $levelUpType;

    public function __construct($timestamp, $participantId, $skillSlot, $levelUpType)
    {
        parent::__construct($timestamp, TimelineEvent::SKILL_LEVEL_UP);
        $this->participantId = $participantId;
        $this->skillSlot = $skillSlot;
        $this->levelUpType = $levelUpType;
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
    public function getSkillSlot(): int
    {
        return $this->skillSlot;
    }

    /**
     * @return string
     */
    public function getLevelUpType(): string
    {
        return $this->levelUpType;
    }
}