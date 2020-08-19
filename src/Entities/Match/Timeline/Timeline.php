<?php


namespace src\Entities\Match\Timeline;


use src\Entities\Match\Timeline\Events\AbstractTimelineEvent;
use src\Entities\Match\Timeline\Events\BuildingKillEvent;
use src\Entities\Match\Timeline\Events\ChampionKillEvent;
use src\Entities\Match\Timeline\Events\EliteMonsterKillEvent;
use src\Entities\Match\Timeline\Events\ItemDestroyedEvent;
use src\Entities\Match\Timeline\Events\ItemPurchasedEvent;
use src\Entities\Match\Timeline\Events\ItemSoldEvent;
use src\Entities\Match\Timeline\Events\ItemUndoEvent;
use src\Entities\Match\Timeline\Events\SkillLevelUpEvent;
use src\Entities\Match\Timeline\Events\TimelineEvent;
use src\Entities\Match\Timeline\Events\WardKillEvent;
use src\Entities\Match\Timeline\Events\WardPlacedEvent;
use src\Helper\HTTPClient;

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
     * @param $gameId int
     * @return Timeline[]
     */
    public static function getTimelinesForMatch($gameId){
        $timelines = array();
        $timelinesObj = json_decode(HTTPClient::getInstance()->requestMatchEndpoint("timelines/by-match/".$gameId));
        self::$frameInterval = $timelinesObj->frameInterval;
        foreach ($timelinesObj->frames as $frame){
            $participants = array();
            for($i = 1; $i <= 10; $i++) {
                $participants[] = new TimelineParticipant($frame->participantFrames->{$i});
            }

            $events = array();
            foreach ($frame->events as $event){
                switch ($event->type){
                    case TimelineEvent::CHAMPION_KILL:
                        $killer = TimelineParticipant::getParticipantById($participants, $event->killerId);
                        $victim = TimelineParticipant::getParticipantById($participants, $event->victimId);
                        $assists = TimelineParticipant::getParticipantByIds($participants, $event->assistingParticipantIds);
                        $events[] = new ChampionKillEvent($event->timestamp, $event->position->x, $event->position->y,
                            $killer, $victim, $assists);
                        break;
                    case TimelineEvent::WARD_PLACED:
                        $creator = TimelineParticipant::getParticipantById($participants, $event->creatorId);
                        $events[] = new WardPlacedEvent($event->timestamp, $event->wardType, $creator);
                        break;
                    case TimelineEvent::WARD_KILL:
                        $killer = TimelineParticipant::getParticipantById($participants, $event->killerId);
                        $events[] = new WardKillEvent($event->timestamp, $event->wardType, $killer);
                        break;
                    case TimelineEvent::BUILDING_KILL:
                        $killer = TimelineParticipant::getParticipantById($participants, $event->killerId);
                        $assists = TimelineParticipant::getParticipantByIds($participants, $event->assistingParticipantIds);
                        $events[] = new BuildingKillEvent($event->timestamp, $event->position->x, $event->position->y,
                            $killer, $assists, $event->teamId, $event->buildingType, $event->laneType, $event->towerType);
                        break;
                    case TimelineEvent::ELITE_MONSTER_KILL:
                        $killer = TimelineParticipant::getParticipantById($participants, $event->killerId);
                        $events[] = new EliteMonsterKillEvent($event->timestamp, $event->position->x, $event->position->y,
                            $killer, $event->monsterType,
                            property_exists($event, 'monsterSubType') ? $event->monsterSubType : null);
                        break;
                    case TimelineEvent::ITEM_PURCHASED:
                        $participant = TimelineParticipant::getParticipantById($participants, $event->participantId);
                        $events[] = new ItemPurchasedEvent($event->timestamp, $participant, $event->itemId);
                        break;
                    case TimelineEvent::ITEM_SOLD:
                        $participant = TimelineParticipant::getParticipantById($participants, $event->participantId);
                        $events[] = new ItemSoldEvent($event->timestamp, $participant, $event->itemId);
                        break;
                    case TimelineEvent::ITEM_DESTROYED:
                        $participant = TimelineParticipant::getParticipantById($participants, $event->participantId);
                        $events[] = new ItemDestroyedEvent($event->timestamp, $participant, $event->itemId);
                        break;
                    case TimelineEvent::ITEM_UNDO:
                        $participant = TimelineParticipant::getParticipantById($participants, $event->participantId);
                        $events[] = new ItemUndoEvent($event->timestamp, $participant, $event->afterId, $event->beforeId);
                        break;
                    case TimelineEvent::SKILL_LEVEL_UP:
                        $participant = TimelineParticipant::getParticipantById($participants, $event->participantId);
                        $events[] = new SkillLevelUpEvent($event->timestamp, $participant, $event->skillSlot,
                            $event->levelUpType);
                        break;
                    default:
                        syslog(LOG_WARNING, "Unknown Event Type for Timeline found: ".$event->type.".
                            This is and error, please report it to the author (with game ID)");
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