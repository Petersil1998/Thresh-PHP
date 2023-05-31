<?php

namespace Thresh\Entities\Match\Timeline\Events;

use Thresh\Entities\Match\Timeline\TimelineParticipant;

class ChampionKillEvent extends AbstractTimelineEvent
{
    /**
     * @var int
     */
    private $positionX;

    /**
     * @var int
     */
    private $positionY;

    /**
     * @var TimelineParticipant|null
     */
    private $killer;

    /**
     * @var TimelineParticipant
     */
    private $victim;

    /**
     * @var TimelineParticipant[]
     */
    private $assists;

    /**
     * @var int
     */
    private $bounty;

    /**
     * @var int
     */
    private $killStreakLength;

    /**
     * @var ChampionKillDamage[]
     */
    private $victimDamageDealt;

    /**
     * @var ChampionKillDamage[]
     */
    private $victimDamageReceived;

    /**
     * ChampionKillEvent constructor.
     * @param int $timestamp
     * @param int $positionX
     * @param int $positionY
     * @param TimelineParticipant|null $killer
     * @param TimelineParticipant $victim
     * @param TimelineParticipant[] $assists
     * @param int $bounty
     * @param int $killStreakLength
     * @param ChampionKillDamage[] $victimDamageDealt
     * @param ChampionKillDamage[] $victimDamageReceived
     */
    public function __construct(int $timestamp, int $positionX, int $positionY, ?TimelineParticipant $killer,
                                TimelineParticipant $victim, array $assists, int $bounty,
                                int $killStreakLength, array $victimDamageDealt, array $victimDamageReceived)
    {
        parent::__construct($timestamp, TimelineEvents::CHAMPION_KILL);
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->killer = $killer;
        $this->victim = $victim;
        $this->assists = $assists;
        $this->bounty = $bounty;
        $this->killStreakLength = $killStreakLength;
        $this->victimDamageDealt = $victimDamageDealt;
        $this->victimDamageReceived = $victimDamageReceived;
    }

    /**
     * @return int
     */
    public function getPositionX(): int
    {
        return $this->positionX;
    }

    /**
     * @return int
     */
    public function getPositionY(): int
    {
        return $this->positionY;
    }

    /**
     * @return TimelineParticipant|null
     */
    public function getKiller(): ?TimelineParticipant
    {
        return $this->killer;
    }

    /**
     * @return TimelineParticipant
     */
    public function getVictim(): TimelineParticipant
    {
        return $this->victim;
    }

    /**
     * @return TimelineParticipant[]
     */
    public function getAssists(): array
    {
        return $this->assists;
    }

    /**
     * @return int
     */
    public function getBounty(): int
    {
        return $this->bounty;
    }

    /**
     * @return int
     */
    public function getKillStreakLength(): int
    {
        return $this->killStreakLength;
    }

    /**
     * @return ChampionKillDamage[]
     */
    public function getVictimDamageDealt(): array
    {
        return $this->victimDamageDealt;
    }

    /**
     * @return ChampionKillDamage[]
     */
    public function getVictimDamageReceived(): array
    {
        return $this->victimDamageReceived;
    }
}