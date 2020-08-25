<?php

namespace Thresh\Collections;

use Thresh\Entities\QueueType;

/**
 * This class represents a collection of QueueTypes
 * @see QueueType
 * @package Thresh\Collections
 */
class QueueTypes
{
    /**
     * @var QueueType[]
     */
    private static $queueTypes;

    /**
     * This Method returns the **QueueType** object with the specified ID.
     * If no QueueType with the specified ID was found returns **false**
     * @param $id int QueueType ID
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
     * This Method returns an array containing all QueueTypes
     * @return QueueType[]
     */
    public static function getQueueTypes(): array
    {
        return self::$queueTypes;
    }

    /**
     * Used to set the list of QueueTypes (**Do not use it!**)
     * @param QueueType[] $queueTypes
     */
    public static function setQueueTypes(array $queueTypes): void
    {
        self::$queueTypes = $queueTypes;
    }
}