<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Match\Timeline\TimelineParticipant;

class SkillLevelUpEvent extends AbstractTimelineEvent
{

    /**
     * @var TimelineParticipant
     */
    private $participant;

    /**
     * @var int
     */
    private $skillSlot;

    /**
     * @var string
     */
    private $levelUpType;

    /**
     * SkillLevelUpEvent constructor.
     * @param int $timestamp
     * @param TimelineParticipant $participant
     * @param int $skillSlot
     * @param string $levelUpType
     */
    public function __construct(int $timestamp, TimelineParticipant $participant, int $skillSlot, string $levelUpType)
    {
        parent::__construct($timestamp, TimelineEvents::SKILL_LEVEL_UP);
        $this->participant = $participant;
        $this->skillSlot = $skillSlot;
        $this->levelUpType = $levelUpType;
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