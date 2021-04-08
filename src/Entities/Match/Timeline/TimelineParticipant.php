<?php

namespace Thresh\Entities\Match\Timeline;

use stdClass;

class TimelineParticipant
{
    /**
     * @var int
     */
    private $participantId;

    /**
     * @var int
     */
    private $positionX;

    /**
     * @var int
     */
    private $positionY;

    /**
     * @var int
     */
    private $currentGold;

    /**
     * @var int
     */
    private $totalGold;

    /**
     * @var int
     */
    private $level;

    /**
     * @var int
     */
    private $xp;

    /**
     * @var int
     */
    private $minionsKilled;

    /**
     * @var int
     */
    private $jungleMinionsKilled;

    /**
     * @var int
     */
    private $dominionScore;

    /**
     * @var int
     */
    private $teamScore;

    /**
     * TimelineParticipant constructor.
     * @param stdClass $timelineParticipantData
     */
    public function __construct(stdClass $timelineParticipantData)
    {
        $this->setProperty($timelineParticipantData, 'participantId');
        $this->setProperty($timelineParticipantData, 'currentGold');
        $this->setProperty($timelineParticipantData, 'totalGold');
        $this->setProperty($timelineParticipantData, 'level');
        $this->setProperty($timelineParticipantData, 'xp');
        $this->setProperty($timelineParticipantData, 'minionsKilled');
        $this->setProperty($timelineParticipantData, 'jungleMinionsKilled');
        $this->setProperty($timelineParticipantData, 'dominionScore');
        $this->setProperty($timelineParticipantData, 'teamScore');
        if(property_exists($timelineParticipantData,'position')) {
            $this->setProperty($timelineParticipantData->position, 'x', 'positionX');
            $this->setProperty($timelineParticipantData->position, 'y', 'positionY');
        }
    }

    /**
     * @param stdClass $object The object that holds the property to be set
     * @param string $property The properties name (has to be the same in $this and in the object)
     * @param string $alternativeName The alternative Property name if it differs from the objects property name
     * @param bool $convertPropertyToArray whether or not the property should be converted to an associative array
     * (only works if the property is instance of stdClass)
     */
    private function setProperty(stdClass $object, string $property, $alternativeName = '', $convertPropertyToArray = false){
        $thisFieldName = $property;
        if(!empty($alternativeName)){
            $thisFieldName = $alternativeName;
        }
        if(property_exists($object, $property)){
            if($convertPropertyToArray && $object->$property instanceof stdClass){
                $this->$thisFieldName = json_decode(json_encode($object->$property), true);
            } else {
                $this->$thisFieldName = $object->$property;
            }
        }
    }

    /**
     * @param TimelineParticipant[] $participants
     * @param int $id
     * @return false|TimelineParticipant
     */
    public static function getParticipantById(array $participants, int $id){
        foreach ($participants as $participant){
            if($participant->getParticipantId() === $id){
                return $participant;
            }
        }
        return false;
    }

    /**
     * @param TimelineParticipant[] $participants
     * @param int[] $ids
     * @return TimelineParticipant[]
     */
    public static function getParticipantByIds(array $participants, array $ids): array
    {
        $realParticipants = array();
        foreach ($participants as $participant){
            if(in_array($participant->getParticipantId(), $ids)){
                $realParticipants[] = $participant;
            }
        }
        return $realParticipants;
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
     * @return int
     */
    public function getCurrentGold(): int
    {
        return $this->currentGold;
    }

    /**
     * @return int
     */
    public function getTotalGold(): int
    {
        return $this->totalGold;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @return int
     */
    public function getXp(): int
    {
        return $this->xp;
    }

    /**
     * @return int
     */
    public function getMinionsKilled(): int
    {
        return $this->minionsKilled;
    }

    /**
     * @return int
     */
    public function getJungleMinionsKilled(): int
    {
        return $this->jungleMinionsKilled;
    }

    /**
     * @return int
     */
    public function getDominionScore(): int
    {
        return $this->dominionScore;
    }

    /**
     * @return int
     */
    public function getTeamScore(): int
    {
        return $this->teamScore;
    }
}