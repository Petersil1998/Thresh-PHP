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
     * @var int
     */
    private $gameId;

    /**
     * @var string
     */
    private $matchId;

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
    private $gameStart;

    /**
     * @var QueueType
     */
    private $queueType;

    /**
     * @var Map
     */
    private $map;

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
    private $gameName;

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
     * @var string
     */
    private $tournamentCode;

    /**
     * @var Timeline[]
     */
    private $timelines;

    /**
     * MatchDetails constructor.
     * @param string $matchID
     */
    public function __construct(string $matchID)
    {
        $match = json_decode(RiotAPIRequest::requestLoLMatchEndpoint('matches/'.$matchID)->getBody());
        $this->gameId = $match->info->gameId;
        $this->matchId = $match->metadata->matchId;
        $this->gameCreation = $match->info->gameCreation;
        $this->gameDuration = $match->info->gameDuration;
        $this->gameMode = $match->info->gameMode;
        $this->gameName = $match->info->gameName;
        $this->gameStart = $match->info->gameStartTimestamp;
        $this->gameType = $match->info->gameType;
        $this->gameVersion = $match->info->gameVersion;
        $this->map = Maps::getMap($match->info->mapId);
        $this->platformId = $match->info->platformId;
        $this->queueType = QueueTypes::getQueueType($match->info->queueId);
        $this->tournamentCode = $match->info->tournamentCode;

        foreach ($match->info->teams as $team){
            if($team->teamId === 100){
                $this->blueTeam = new Team($team);
            } elseif ($team->teamId === 200){
                $this->redTeam = new Team($team);
            }
        }
        foreach ($match->info->participants as $participant){
            $this->participants[] = new MatchParticipant($participant);
        }
    }

    /**
     * @return int
     */
    public function getGameId(): int
    {
        return $this->gameId;
    }

    /**
     * @return string
     */
    public function getMatchId(): string
    {
        return $this->matchId;
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
    public function getGameStart(): int
    {
        return $this->gameStart;
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
    public function getGameName(): string
    {
        return $this->gameName;
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
     * @return string
     */
    public function getTournamentCode(): string
    {
        return $this->tournamentCode;
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
            $this->timelines = Timeline::getTimelinesForMatch($this->matchId, $this->blueTeam, $this->redTeam);
        }
        return $this->timelines;
    }
}