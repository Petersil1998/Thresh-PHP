<?php


namespace src\Collections;


use src\Entities\QueueType;

class QueueTypes
{
    /**
     * @var QueueType[]
     */
    private static $queueTypes;

    /**
     * @param $id int
     * @return false|QueueType
     */
    public static function getQueueType($id){
        foreach (self::$queueTypes as $queueType){
            if($queueType->getId() === $id){
                return $queueType;
            }
        }
        return false;
    }

    /**
     * @return QueueType[]
     */
    public static function getQueueTypes(): array
    {
        return self::$queueTypes;
    }

    /**
     * @param QueueType[] $queueTypes
     */
    public static function setQueueTypes(array $queueTypes): void
    {
        self::$queueTypes = $queueTypes;
    }
}