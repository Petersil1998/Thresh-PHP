<?php

namespace Thresh\Entities\Match\Timeline;

use Thresh\Collections\Items;
use Thresh\Entities\Match\Timeline\Events\AbstractTimelineEvent;
use Thresh\Entities\Match\Timeline\Events\BuildingKillEvent;
use Thresh\Entities\Match\Timeline\Events\ChampionKillEvent;
use Thresh\Entities\Match\Timeline\Events\EliteMonsterKillEvent;
use Thresh\Entities\Match\Timeline\Events\ItemDestroyedEvent;
use Thresh\Entities\Match\Timeline\Events\ItemPurchasedEvent;
use Thresh\Entities\Match\Timeline\Events\ItemSoldEvent;
use Thresh\Entities\Match\Timeline\Events\ItemUndoEvent;
use Thresh\Entities\Match\Timeline\Events\SkillLevelUpEvent;
use Thresh\Entities\Match\Timeline\Events\TimelineEvents;
use Thresh\Entities\Match\Timeline\Events\WardKillEvent;
use Thresh\Entities\Match\Timeline\Events\WardPlacedEvent;
use Thresh\Helper\HTTPClient;

/**
 * This class represents a Timeline within a Match (a Match consists of a List of Timelines).
 * Each Timeline consist of Participants and Events
 * @see TimelineEvents
 * @see TimelineParticipant
 * @package Thresh\Entities\Match\Timeline
 */
class Timeline
{

    private static $frameInterval = -1;

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
     * @param $participants TimelineParticipant[]
     * @param $events AbstractTimelineEvent[]
     * @param $timestamp int
     */
    private function __construct($participants, $events, $timestamp)
    {
        $this->participants = $participants;
        $this->events = $events;
        $this->timestamp = $timestamp;
    }

    /**
     * This Method returns an array of Timelines of which the specified Match consists off
     * @param $matchID int
     * @return Timeline[]
     */
    public static function getTimelinesForMatch($matchID){
        $timelines = array();
        $timelinesObj = json_decode(HTTPClient::getInstance()->requestMatchEndpoint('timelines/by-match/'.$matchID));
        self::$frameInterval = $timelinesObj->frameInterval;
        foreach ($timelinesObj->frames as $frame){
            $participants = array();
            for($i = 1; $i <= 10; $i++) {
                $participants[] = new TimelineParticipant($frame->participantFrames->{$i});
            }

            $events = array();
            foreach ($frame->events as $event){
                switch ($event->type){
                    case TimelineEvents::CHAMPION_KILL:
                        $killer = TimelineParticipant::getParticipantById($participants, $event->killerId);
                        $victim = TimelineParticipant::getParticipantById($participants, $event->victimId);
                        $assists = TimelineParticipant::getParticipantByIds($participants, $event->assistingParticipantIds);
                        $events[] = new ChampionKillEvent($event->timestamp, $event->position->x, $event->position->y,
                            $killer, $victim, $assists);
                        break;
                    case TimelineEvents::WARD_PLACED:
                        $creator = TimelineParticipant::getParticipantById($participants, $event->creatorId);
                        $events[] = new WardPlacedEvent($event->timestamp, $event->wardType, $creator);
                        break;
                    case TimelineEvents::WARD_KILL:
                        $killer = TimelineParticipant::getParticipantById($participants, $event->killerId);
                        $events[] = new WardKillEvent($event->timestamp, $event->wardType, $killer);
                        break;
                    case TimelineEvents::BUILDING_KILL:
                        $killer = TimelineParticipant::getParticipantById($participants, $event->killerId);
                        $assists = TimelineParticipant::getParticipantByIds($participants, $event->assistingParticipantIds);
                        $events[] = new BuildingKillEvent($event->timestamp, $event->position->x, $event->position->y,
                            $killer, $assists, $event->teamId, $event->buildingType, $event->laneType, $event->towerType);
                        break;
                    case TimelineEvents::ELITE_MONSTER_KILL:
                        $killer = TimelineParticipant::getParticipantById($participants, $event->killerId);
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
                        $events[] = new ItemUndoEvent($event->timestamp, $participant, Items::getItem($event->afterId), Items::getItem($event->beforeId));
                        break;
                    case TimelineEvents::SKILL_LEVEL_UP:
                        $participant = TimelineParticipant::getParticipantById($participants, $event->participantId);
                        $events[] = new SkillLevelUpEvent($event->timestamp, $participant, $event->skillSlot,
                            $event->levelUpType);
                        break;
                    default:
                        syslog(LOG_WARNING, 'Unknown Event Type for Timeline found: '.$event->type.'.
                            This is and error, please report it to the author (with game ID)');
                        break;
                }
            }
            $timelines[] = new Timeline($participants, $events, $frame->timestamp);
        }
        return $timelines;
    }

    /**
     * @return int
     */
    public static function getFrameInterval(): int
    {
        return self::$frameInterval;
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