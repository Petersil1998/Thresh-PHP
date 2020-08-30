<?php

namespace Thresh\Entities\ActiveGame;

use RuntimeException;
use Thresh\Collections\Champions;
use Thresh\Collections\Maps;
use Thresh\Collections\QueueTypes;
use Thresh\Entities\Map;
use Thresh\Entities\QueueType;
use Thresh\Entities\Summoner\Summoner;
use Thresh\Entities\Summoner\Participant;
use Thresh\Helper\HTTPClient;

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
     * @param Summoner $summoner
     */
    public function __construct($summoner)
    {
        $game = json_decode(HTTPClient::getInstance()->requestSpectatorEndpoint('active-games/by-summoner/' . $summoner->getId()));
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
    private function loadParticipants($participants){
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
