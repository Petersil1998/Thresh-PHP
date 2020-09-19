<?php

namespace Thresh\Entities\ActiveGame;

use RuntimeException;
use Thresh\Helper\RiotAPIRequest;
use Thresh_Core\Collections\Champions;
use Thresh_Core\Collections\Maps;
use Thresh_Core\Collections\QueueTypes;
use Thresh_Core\Objects\Map;
use Thresh_Core\Objects\QueueType;

/**
 * This class represents an active Game of a Summoner
 * @package Thresh\Entities\Match
 */
class ActiveGame
{
    /**
     * @var int
     */
    private $gameId;

    /**
     * @var Map
     */
    private $map;

    /**
     * @var string
     */
    private $gameMode;

    /**
     * @var string
     */
    private $gameType;

    /**
     * @var QueueType
     */
    private $queueType;

    /**
     * @var Participant[]
     */
    private $blueSideTeam;

    /**
     * @var Participant[]
     */
    private $redSideTeam;

    /**
     * @var int
     */
    private $teamsize;

    /**
     * @var Ban[]
     */
    private $bans;

    /**
     * @var string
     */
    private $spectatorKey;

    /**
     * @var string
     */
    private $platformId;

    /**
     * @var int
     */
    private $startTime;

    /**
     * @var int
     */
    private $duration;

    /**
     * Game constructor.
     * @param string $summonerId
     */
    public function __construct(string $summonerId)
    {
        $game = json_decode(RiotAPIRequest::requestLoLSpectatorEndpoint('active-games/by-summoner/' . $summonerId));
        if(!empty($game)) {
            $this->gameId = $game->gameId;
            $this->map = Maps::getMap($game->mapId);
            $this->gameMode = $game->gameMode;
            $this->gameType = $game->gameType;
            $this->queueType = QueueTypes::getQueueType($game->gameQueueConfigId);
            $this->teamsize = (count($game->participants)) / 2;
            $bans = array();
            foreach ($game->bannedChampions as $ban){
                $bans[] = new Ban(Champions::getChampion($ban->championId), $ban->teamId, $ban->pickTurn);
            }
            $this->bans = $bans;
            $this->spectatorKey = $game->observers->encryptionKey;
            $this->platformId = $game->platformId;
            $this->startTime = $game->gameStartTime;
            $this->duration = $game->gameLength;
            $this->loadParticipants($game->participants);
        }
    }

    public function exists(){
        return !empty($this->getGameId());
    }

    /**
     * @param array $participants
     */
    private function loadParticipants(array $participants){
        $this->blueSideTeam = array();
        $this->redSideTeam = array();
        foreach ($participants as $participant){
            $player = new Participant($participant);
            if($player->getTeamId() == 100){
                $this->blueSideTeam[] = $player;
            } elseif ($player->getTeamId() == 200){
                $this->redSideTeam[] = $player;
            } else {
                throw new RuntimeException('Unknown TeamID: '.$player->getTeamId());
            }
        }
    }

    /**
     * @return int
     */
    public function getGameId()
    {
        return $this->gameId;
    }

    /**
     * @return Map
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * @return string
     */
    public function getGameMode()
    {
        return $this->gameMode;
    }

    /**
     * @return string
     */
    public function getGameType()
    {
        return $this->gameType;
    }

    /**
     * @return QueueType
     */
    public function getQueueType()
    {
        return $this->queueType;
    }

    /**
     * @return Participant[]
     */
    public function getBlueSideTeam(): array
    {
        return $this->blueSideTeam;
    }

    /**
     * @return Participant[]
     */
    public function getRedSideTeam(): array
    {
        return $this->redSideTeam;
    }

    /**
     * @return int
     */
    public function getTeamsize()
    {
        return $this->teamsize;
    }

    /**
     * @return Ban[]
     */
    public function getBans(): array
    {
        return $this->bans;
    }

    /**
     * @return string
     */
    public function getSpectatorKey(): string
    {
        return $this->spectatorKey;
    }

    /**
     * @return string
     */
    public function getPlatformId(): string
    {
        return $this->platformId;
    }

    /**
     * @return int
     */
    public function getStartTime(): int
    {
        return $this->startTime;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }
}
