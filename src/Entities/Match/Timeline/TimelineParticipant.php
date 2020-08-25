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
     * @param $data stdClass
     */
    public function __construct($data)
    {
        $this->setProperty($data, 'participantId');
        $this->setProperty($data, 'currentGold');
        $this->setProperty($data, 'totalGold');
        $this->setProperty($data, 'level');
        $this->setProperty($data, 'xp');
        $this->setProperty($data, 'minionsKilled');
        $this->setProperty($data, 'jungleMinionsKilled');
        $this->setProperty($data, 'dominionScore');
        $this->setProperty($data, 'teamScore');
        if(property_exists($data,'position')) {
            $this->setProperty($data->position, 'x', 'positionX');
            $this->setProperty($data->position, 'y', 'positionY');
        }
    }

    /**
     * @param $object stdClass The object that holds the property to be set
     * @param $property string The properties name (has to be the same in $this and in the object)
     * @param $alternativeName string The alternative Property name if it differs from the objects property name
     * @param $convertPropertyToArray bool whether or not the property should be converted to an associative array
     * (only works if the property is instance of stdClass)
     */
    protected function setProperty($object, $property, $alternativeName = '', $convertPropertyToArray = false){
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
     * @param $participants TimelineParticipant[]
     * @param $id int
     * @return false|TimelineParticipant
     */
    public static function getParticipantById($participants, $id){
        foreach ($participants as $participant){
            if($participant->getParticipantId() === $id){
                return $participant;
            }
        }
        return false;
    }

    /**
     * @param $participants TimelineParticipant[]
     * @param $ids array
     * @return TimelineParticipant[]
     */
    public static function getParticipantByIds($participants, $ids){
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