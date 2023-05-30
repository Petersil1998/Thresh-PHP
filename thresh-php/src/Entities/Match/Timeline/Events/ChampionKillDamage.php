<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Match\Timeline\TimelineParticipant;
use Thresh_Core\Objects\Champions\Champion;

class ChampionKillDamage
{

    /**
     * @var bool
     */
    private $basic;

    /**
     * @var int
     */
    private $physicalDamage;

    /**
     * @var int
     */
    private $magicDamage;

    /**
     * @var int
     */
    private $trueDamage;

    /**
     * @var TimelineParticipant|null
     */
    private $participant;

    /**
     * @var Champion|null
     */
    private $champion;

    /**
     * @var string
     */
    private $spellName;

    /**
     * @var int
     */
    private $spellSlot;

    /**
     * @var string
     */
    private $type;

    /**
     * @param bool $basic
     * @param int $physicalDamage
     * @param int $magicDamage
     * @param int $trueDamage
     * @param TimelineParticipant|null $participant
     * @param Champion|null $champion
     * @param string $spellName
     * @param int $spellSlot
     * @param string $type
     */
    public function __construct(bool $basic, int $physicalDamage, int $magicDamage, int $trueDamage, ?TimelineParticipant $participant,
                                ?Champion $champion, string $spellName, int $spellSlot, string $type)
    {
        $this->basic = $basic;
        $this->physicalDamage = $physicalDamage;
        $this->magicDamage = $magicDamage;
        $this->trueDamage = $trueDamage;
        $this->participant = $participant;
        $this->champion = $champion;
        $this->spellName = $spellName;
        $this->spellSlot = $spellSlot;
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function isBasic(): bool
    {
        return $this->basic;
    }

    /**
     * @return int
     */
    public function getPhysicalDamage(): int
    {
        return $this->physicalDamage;
    }

    /**
     * @return int
     */
    public function getMagicDamage(): int
    {
        return $this->magicDamage;
    }

    /**
     * @return int
     */
    public function getTrueDamage(): int
    {
        return $this->trueDamage;
    }

    /**
     * @return TimelineParticipant|null
     */
    public function getParticipant(): ?TimelineParticipant
    {
        return $this->participant;
    }

    /**
     * @return Champion|null
     */
    public function getChampion(): ?Champion
    {
        return $this->champion;
    }

    /**
     * @return string
     */
    public function getSpellName(): string
    {
        return $this->spellName;
    }

    /**
     * @return int
     */
    public function getSpellSlot(): int
    {
        return $this->spellSlot;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}