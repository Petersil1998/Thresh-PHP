<?php

namespace Thresh\Entities\Match;

use Thresh\Entities\Match\Timeline\Timeline;
use Thresh\Helper\RiotAPIRequest;
use Thresh_Core\Collections\Maps;
use Thresh_Core\Collections\QueueTypes;
use Thresh_Core\Objects\Map;
use Thresh_Core\Objects\QueueType;

/**
 * This class contains specific Data for a played Match
 * @package Thresh\Entities\Match
 */
class MatchDetails
{
    /**
     * @var float
     */
    private $gameId;

    /**
     * @var string
     */
    private $platformId;

    /**
     * @var float
     */
    private $gameCreation;

    /**
     * @var int
     */
    private $gameDuration;

    /**
     * @var QueueType
     */
    private $queueType;

    /**
     * @var Map
     */
    private $map;

    /**
     * @var int
     */
    private $seasonId;

    /**
     * @var string
     */
    private $gameVersion;

    /**
     * @var string
     */
    private $gameMode;

    /**
     * @var string
     */
    private $gameType;

    /**
     * @var Team
     */
    private $blueTeam;

    /**
     * @var Team
     */
    private $redTeam;

    /**
     * @var MatchParticipant[]
     */
    private $participants = array();

    /**
     * @var Timeline[]
     */
    private $timelines;

    /**
     * MatchDetails constructor.
     * @param float $gameId
     */
    public function __construct(float $gameId)
    {
        $match = json_decode(RiotAPIRequest::requestLoLMatchEndpoint('matches/'.$gameId));
        $this->gameId = $gameId;
        $this->platformId = $match->platformId;
        $this->gameCreation = $match->gameCreation;
        $this->gameDuration = $match->gameDuration;
        $this->queueType = QueueTypes::getQueueType($match->queueId);
        $this->map = Maps::getMap($match->mapId);
        $this->seasonId = $match->seasonId;
        $this->gameVersion = $match->gameVersion;
        $this->gameCreation = $match->gameMode;
        $this->gameType = $match->gameType;
        foreach ($match->teams as $team){
            if($team->teamId === 100){
                $this->blueTeam = new Team($team);
            } elseif ($team->teamId === 200){
                $this->redTeam = new Team($team);
            }
        }
        foreach ($match->participants as $participant){
            $this->participants[] = new MatchParticipant($participant);
        }
    }

    /**
     * @return float
     */
    public function getGameId(): float
    {
        return $this->gameId;
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
    public function getGameCreation(): float
    {
        return $this->gameCreation;
    }

    /**
     * @return int
     */
    public function getGameDuration(): int
    {
        return $this->gameDuration;
    }

    /**
     * @return QueueType
     */
    public function getQueueType(): QueueType
    {
        return $this->queueType;
    }

    /**
     * @return Map
     */
    public function getMap(): Map
    {
        return $this->map;
    }

    /**
     * @return int
     */
    public function getSeasonId(): int
    {
        return $this->seasonId;
    }

    /**
     * @return string
     */
    public function getGameVersion(): string
    {
        return $this->gameVersion;
    }

    /**
     * @return string
     */
    public function getGameMode(): string
    {
        return $this->gameMode;
    }

    /**
     * @return string
     */
    public function getGameType(): string
    {
        return $this->gameType;
    }

    /**
     * @return Team
     */
    public function getBlueTeam(): Team
    {
        return $this->blueTeam;
    }

    /**
     * @return Team
     */
    public function getRedTeam(): Team
    {
        return $this->redTeam;
    }

    /**
     * @return MatchParticipant[]
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    /**
     * @return Timeline[]
     */
    public function getTimelines(): array
    {
        if(empty($this->timelines)){
            $this->timelines = Timeline::getTimelinesForMatch($this->gameId);
        }
        return $this->timelines;
    }
}