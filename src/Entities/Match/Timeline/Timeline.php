<?php

namespace Thresh\Entities\Match\Timeline;

use Thresh\Entities\Match\MatchParticipant;
use Thresh\Entities\Match\Team;
use Thresh\Entities\Match\Timeline\Events\AbstractTimelineEvent;
use Thresh\Entities\Match\Timeline\Events\BuildingKillEvent;
use Thresh\Entities\Match\Timeline\Events\ChampionKillDamage;
use Thresh\Entities\Match\Timeline\Events\ChampionKillEvent;
use Thresh\Entities\Match\Timeline\Events\ChampionSpecialKillEvent;
use Thresh\Entities\Match\Timeline\Events\DragonSoulGivenEvent;
use Thresh\Entities\Match\Timeline\Events\EliteMonsterKillEvent;
use Thresh\Entities\Match\Timeline\Events\GameEndEvent;
use Thresh\Entities\Match\Timeline\Events\ItemDestroyedEvent;
use Thresh\Entities\Match\Timeline\Events\ItemPurchasedEvent;
use Thresh\Entities\Match\Timeline\Events\ItemSoldEvent;
use Thresh\Entities\Match\Timeline\Events\ItemUndoEvent;
use Thresh\Entities\Match\Timeline\Events\LevelUpEvent;
use Thresh\Entities\Match\Timeline\Events\PauseEndEvent;
use Thresh\Entities\Match\Timeline\Events\SkillLevelUpEvent;
use Thresh\Entities\Match\Timeline\Events\TimelineEvents;
use Thresh\Entities\Match\Timeline\Events\TurretPlateDestroyedEvent;
use Thresh\Entities\Match\Timeline\Events\WardKillEvent;
use Thresh\Entities\Match\Timeline\Events\WardPlacedEvent;
use Thresh\Helper\RiotAPIRequest;
use Thresh_Core\Collections\Items;
use Thresh_Core\Objects\Item;

/**
 * This class represents a Timeline within a Match (a Match consists of a List of Timelines).
 * Each Timeline consist of Participants and Events
 * @see TimelineEvents
 * @see TimelineParticipant
 * @package Thresh\Entities\Match\Timeline
 */
class Timeline
{

    /**
     * @var int
     */
    private $frameInterval;

    /**
     * @var TimelineParticipant[]
     */
    private $participants;

    /**
     * @var AbstractTimelineEvent[]
     */
    private $events;

    /**
     * @var int
     */
    private $timestamp;

    /**
     * Timeline constructor.
     * @param TimelineParticipant[] $participants
     * @param AbstractTimelineEvent[] $events
     * @param int $timestamp
     * @param int $frameInterval
     */
    private function __construct(array $participants, array $events, int $timestamp, int $frameInterval)
    {
        $this->participants = $participants;
        $this->events = $events;
        $this->timestamp = $timestamp;
        $this->frameInterval = $frameInterval;
    }

    /**
     * This Method returns an array of Timelines of which the specified Match consists off
     * @param string $matchID
     * @param MatchParticipant[] $matchParticipants
     * @param Team $blueTeam
     * @param Team $redTeam
     * @return Timeline[]
     */
    public static function getTimelinesForMatch(string $matchID, array $matchParticipants, Team $blueTeam, Team $redTeam): array
    {
        $timelines = array();
        $response = RiotAPIRequest::requestLoLMatchEndpoint('matches/'.$matchID.'/timeline');
        $timelinesObj = json_decode($response->getBody());
        $frameInterval = $timelinesObj->info->frameInterval;
        foreach ($timelinesObj->info->frames as $frame){
            $participants = array();
            for($i = 1; $i <= 10; $i++) {
                $participants[] = new TimelineParticipant($frame->participantFrames->{$i});
            }
            $events = array();
            foreach ($frame->events as $event){
                switch ($event->type){
                    case TimelineEvents::CHAMPION_KILL:
                        $killer = $event->killerId === 0 ? null : TimelineParticipant::getParticipantById($participants, $event->killerId);
                        $victim = TimelineParticipant::getParticipantById($participants, $event->victimId);
                        $assists = array();
                        if(isset($event->assistingParticipantIds)) {
                            $assists = TimelineParticipant::getParticipantByIds($participants, $event->assistingParticipantIds);
                        }
                        $victimDamageDealt = array();
                        if(isset($event->victimDamageDealt)) {
                            foreach ($event->victimDamageDealt as $damage) {
                                $participant = TimelineParticipant::getParticipantById($participants, $damage->participantId);
                                $matchParticipant = self::getMatchParticipant($matchParticipants, $damage->participantId);
                                $victimDamageDealt[] = new ChampionKillDamage($damage->basic, $damage->physicalDamage, $damage->magicDamage, $damage->trueDamage,
                                    $participant, $matchParticipant->getChampion(), $damage->spellName, $damage->spellSlot, $damage->type);
                            }
                        }
                        $victimDamageReceived = array();
                        foreach ($event->victimDamageReceived as $damage) {
                            if($damage->participantId === 0) {
                                $victimDamageReceived[] = new ChampionKillDamage($damage->basic, $damage->physicalDamage, $damage->magicDamage, $damage->trueDamage,
                                    null, null, $damage->spellName, $damage->spellSlot, $damage->type);
                            } else {
                                $participant = TimelineParticipant::getParticipantById($participants, $damage->participantId);
                                $matchParticipant = self::getMatchParticipant($matchParticipants, $damage->participantId);
                                $victimDamageReceived[] = new ChampionKillDamage($damage->basic, $damage->physicalDamage, $damage->magicDamage, $damage->trueDamage,
                                    $participant, $matchParticipant->getChampion(), $damage->spellName, $damage->spellSlot, $damage->type);
                            }
                        }
                        $events[] = new ChampionKillEvent($event->timestamp, $event->position->x, $event->position->y,
                            $killer, $victim, $assists, $event->bounty, $event->killStreakLength, $victimDamageDealt, $victimDamageReceived);
                        break;
                    case TimelineEvents::WARD_PLACED:
                        $creator = $event->creatorId === 0 ? null : TimelineParticipant::getParticipantById($participants, $event->creatorId);
                        $events[] = new WardPlacedEvent($event->timestamp, $event->wardType, $creator);
                        break;
                    case TimelineEvents::WARD_KILL:
                        $killer = TimelineParticipant::getParticipantById($participants, $event->killerId);
                        $events[] = new WardKillEvent($event->timestamp, $event->wardType, $killer);
                        break;
                    case TimelineEvents::BUILDING_KILL:
                        $towerType = isset($event->towerType) ?? "";
                        $killer = $event->killerId === 0 ? null : TimelineParticipant::getParticipantById($participants, $event->killerId);
                        $assists = array();
                        if (isset($event->assistingParticipantIds)) {
                            $assists = TimelineParticipant::getParticipantByIds($participants, $event->assistingParticipantIds);
                        }
                        $events[] = new BuildingKillEvent($event->timestamp, $event->position->x, $event->position->y,
                            $killer, $assists, $event->teamId, $event->buildingType, $event->laneType, $towerType);
                        break;
                    case TimelineEvents::ELITE_MONSTER_KILL:
                        $killer = $event->killerId === 0 ? null : TimelineParticipant::getParticipantById($participants, $event->killerId);
                        $events[] = new EliteMonsterKillEvent($event->timestamp, $event->position->x, $event->position->y,
                            $killer, $event->monsterType,
                            property_exists($event, 'monsterSubType') ? $event->monsterSubType : null);
                        break;
                    case TimelineEvents::ITEM_PURCHASED:
                        $participant = TimelineParticipant::getParticipantById($participants, $event->participantId);
                        $events[] = new ItemPurchasedEvent($event->timestamp, $participant, Items::getItem($event->itemId));
                        break;
                    case TimelineEvents::ITEM_SOLD:
                        $participant = TimelineParticipant::getParticipantById($participants, $event->participantId);
                        $events[] = new ItemSoldEvent($event->timestamp, $participant, Items::getItem($event->itemId));
                        break;
                    case TimelineEvents::ITEM_DESTROYED:
                        $participant = TimelineParticipant::getParticipantById($participants, $event->participantId);
                        $events[] = new ItemDestroyedEvent($event->timestamp, $participant, Items::getItem($event->itemId));
                        break;
                    case TimelineEvents::ITEM_UNDO:
                        $participant = TimelineParticipant::getParticipantById($participants, $event->participantId);
                        $after = $event->afterId === 0 ? Items::$DEFAULT_ITEM : Items::getItem($event->afterId);
                        $before = $event->beforeId === 0 ? Items::$DEFAULT_ITEM : Items::getItem($event->beforeId);
                        $events[] = new ItemUndoEvent($event->timestamp, $participant, $after, $before, $event->goldGain);
                        break;
                    case TimelineEvents::SKILL_LEVEL_UP:
                        $participant = TimelineParticipant::getParticipantById($participants, $event->participantId);
                        $events[] = new SkillLevelUpEvent($event->timestamp, $participant, $event->skillSlot, $event->levelUpType);
                        break;
                    case TimelineEvents::PAUSE_END:
                        $events[] = new PauseEndEvent($event->timestamp);
                        break;
                    case TimelineEvents::LEVEL_UP:
                        $participant = TimelineParticipant::getParticipantById($participants, $event->participantId);
                        $events[] = new LevelUpEvent($event->timestamp, $event->level, $participant);
                        break;
                    case TimelineEvents::GAME_END:
                        $events[] = new GameEndEvent($event->timestamp, $event->gameId, $blueTeam->hasWon() ? $blueTeam : $redTeam);
                        break;
                    case TimelineEvents::CHAMPION_SPECIAL_KILL:
                        $multiKillLength = isset($event->multiKillLength) ?? 1;
                        $killer = TimelineParticipant::getParticipantById($participants, $event->killerId);
                        $events[] = new ChampionSpecialKillEvent($event->timestamp, $event->killType, $killer, $multiKillLength, $event->position->x, $event->position->y);
                        break;
                    case TimelineEvents::TURRET_PLATE_DESTROYED:
                        $team = $event->teamId === $blueTeam->getTeamId() ? $blueTeam : $redTeam;
                        $killer = $event->killerId === 0 ? null : TimelineParticipant::getParticipantById($participants, $event->killerId);
                        $events[] = new TurretPlateDestroyedEvent($event->timestamp, $killer, $event->laneType, $event->position->x, $event->position->y, $team);
                        break;
                    case TimelineEvents::DRAGON_SOUL_GIVEN:
                        $team = $event->teamId === $blueTeam->getTeamId() ? $blueTeam : $redTeam;
                        $events[] = new DragonSoulGivenEvent($event->timestamp, $event->name, $team);
                        break;
                    default:
                        var_dump("ERROR".$event->type);
                        syslog(LOG_WARNING, 'Unknown Event Type for Timeline found: '.$event->type.'.
                            This is and error, please report it to the author (with game ID)');
                        break;
                }
            }
            $timelines[] = new Timeline($participants, $events, $frame->timestamp, $frameInterval);
        }
        return $timelines;
    }

    /**
     * @param MatchParticipant[] $matchParticipants
     * @param $id
     * @return MatchParticipant|false
     */
    private static function getMatchParticipant(array $matchParticipants, $id)
    {
        foreach ($matchParticipants as $matchParticipant) {
            if($matchParticipant->getParticipantId() === $id) {
                return $matchParticipant;
            }
        }
        return false;
    }

    /**
     * @return int
     */
    public function getFrameInterval(): int
    {
        return $this->frameInterval;
    }

    /**
     * @return TimelineParticipant[]
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    /**
     * @return AbstractTimelineEvent[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }
}