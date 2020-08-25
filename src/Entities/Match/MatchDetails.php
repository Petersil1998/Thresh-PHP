<?php

namespace Thresh\Entities\Match;

use Thresh\Entities\Match\Timeline\Timeline;
use Thresh\Helper\HTTPClient;

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
     * @var int
     */
    private $queueId;

    /**
     * @var int
     */
    private $mapId;

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
    public function __construct($gameId)
    {
        $match = json_decode(HTTPClient::getInstance()->requestMatchEndpoint("matches/".$gameId));
        $this->gameId = $gameId;
        $this->platformId = $match->platformId;
        $this->gameCreation = $match->gameCreation;
        $this->gameDuration = $match->gameDuration;
        $this->queueId = $match->queueId;
        $this->mapId = $match->mapId;
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
     * @return int
     */
    public function getQueueId(): int
    {
        return $this->queueId;
    }

    /**
     * @return int
     */
    public function getMapId(): int
    {
        return $this->mapId;
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