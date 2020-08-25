<?php

namespace Thresh\Entities\Match;

use stdClass;
use Thresh\Collections\Champions;
use Thresh\Collections\QueueTypes;
use Thresh\Helper\HTTPClient;

/**
 * This class contains the Summoner-specific Data for a Match. For more Information use MatchDetails
 * @see MatchDetails
 * @package Thresh\Entities\Match
 */
class Match
{
    /**
     * @var string
     */
    private $platformId;

    /**
     * @var float
     */
    private $gameId;

    /**
     * @var int
     */
    private $champion;

    /**
     * @var int
     */
    private $queue;

    /**
     * @var int
     */
    private $season;

    /**
     * @var int
     */
    private $timestamp;

    /**
     * @var string
     */
    private $role;

    /**
     * @var string
     */
    private $lane;

    /**
     * Match constructor.
     * @param stdClass $data
     */
    private function __construct($data)
    {
        $this->platformId = $data->platformId;
        $this->gameId = $data->gameId;
        $this->champion = $data->champion;
        $this->queue = $data->queue;
        $this->season = $data->season;
        $this->timestamp = $data->timestamp;
        $this->role = $data->role;
        $this->lane = $data->lane;
    }

    /**
     * Returns the Match List for a given Account
     * @param string $accountId
     * @param array $filter The filter which can contain the following keys: <ul>
     * <li>champion (array of champion ID's)</li>
     * <li>queue (array of Queue ID's)</li>
     * <li>endTime (end limit for the query in epoch milliseconds)</li>
     * <li>beginTime (begin limit for the query in epoch milliseconds)</li>
     * <li>endIndex (end index for the list of matches)</li>
     * <li>startIndex (start index for the list of matches)</li>
     * </ul>
     * @return Match[] | false Returns false if the filter is invalid, see logs for details
     */
    public static function getMatchListFromAccount($accountId, $filter = array()){
        if(!self::validateFilter($filter)){
            return false;
        }
        $matches = array();
        $matchList = json_decode(HTTPClient::getInstance()->requestMatchEndpoint("matchlists/by-account/".$accountId, $filter));
        $matchObjs = $matchList->matches;
        foreach ($matchObjs as $matchObj){
            $matches[] = new Match($matchObj);
        }
        return $matches;
    }

    /**
     * @param $filter
     * @return bool
     */
    private static function validateFilter($filter){
        if(array_key_exists('champion', $filter)){
            if(is_array($filter['champion'])){
                foreach ($filter['champion'] as $champion){
                    if(Champions::getChampion($champion) === false){
                        syslog(LOG_ERR,'Unknown Champion ID: '.$champion);
                        return false;
                    }
                }
            } else {
                syslog(LOG_ERR,'Filter value of key \'champion\' must be an array');
                return false;
            }
        }
        if(array_key_exists('queue', $filter)){
            if(is_array($filter['queue'])){
                foreach ($filter['queue'] as $queue){
                    if(QueueTypes::getQueueType($queue) === false){
                        syslog(LOG_ERR,'Unknown Queue ID: '.$queue);
                        return false;
                    }
                }
            } else {
                syslog(LOG_ERR,'Filter value of key \'queue\' must be an array');
                return false;
            }
        }
        if(array_key_exists('endTime', $filter)){
            if(!is_int($filter['endTime'])){
                syslog(LOG_ERR,'Filter value of key \'endTime\' must be of type \'int\'');
                return false;
            }
        }
        if(array_key_exists('beginTime', $filter)){
            if(!is_int($filter['beginTime'])){
                syslog(LOG_ERR,'Filter value of key \'beginTime\' must be of type \'int\'');
                return false;
            }
        }
        if(array_key_exists('endTime', $filter) && array_key_exists('beginTime', $filter)){
            if($filter['endTime'] < $filter['beginTime']){
                syslog(LOG_ERR,'endTime must be smaller than beginTime');
                return false;
            }
            if($filter['endTime'] - $filter['beginTime'] > 604800000){
                syslog(LOG_ERR,'Maximum time range is 1 week');
                return false;
            }
        }
        if(array_key_exists('endIndex', $filter)){
            if(!is_int($filter['endIndex'])){
                syslog(LOG_ERR,'Filter value of key \'endIndex\' must be of type \'int\'');
                return false;
            }
        }
        if(array_key_exists('startIndex', $filter)){
            if(!is_int($filter['beginTime'])){
                syslog(LOG_ERR,'Filter value of key \'startIndex\' must be of type \'int\'');
                return false;
            }
        }
        if(array_key_exists('endIndex', $filter) && array_key_exists('startIndex', $filter)){
            if($filter['endIndex'] < $filter['startIndex']){
                syslog(LOG_ERR,'endIndex must be smaller than startIndex');
                return false;
            }
            if($filter['endIndex'] - $filter['beginTime'] > 100){
                syslog(LOG_ERR,'Maximum index range is 100');
                return false;
            }
        }
        return true;
    }

    /**
     * @return string
     */
    public function getPlatformId(): string
    {
        return $this->platformId;
    }

    /**
     * @return float
     */
    public function getGameId(): float
    {
        return $this->gameId;
    }

    /**
     * @return int
     */
    public function getChampion(): int
    {
        return $this->champion;
    }

    /**
     * @return int
     */
    public function getQueue(): int
    {
        return $this->queue;
    }

    /**
     * @return int
     */
    public function getSeason(): int
    {
        return $this->season;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @return string
     */
    public function getLane(): string
    {
        return $this->lane;
    }
}