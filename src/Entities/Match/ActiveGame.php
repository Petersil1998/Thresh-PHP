<?php

namespace Thresh\Entities\Match;

use RuntimeException;
use Thresh\Collections\Maps;
use Thresh\Collections\QueueTypes;
use Thresh\Entities\Map;
use Thresh\Entities\QueueType;
use Thresh\Entities\Summoner\Summoner;
use Thresh\Entities\Summoner\ActiveGameParticipant;
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
     * @var ActiveGameParticipant[]
     */
    private $blueSideTeam;

    /**
     * @var ActiveGameParticipant[]
     */
    private $redSideTeam;

    /**
     * @var int
     */
    private $teamsize;

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
            $player = new ActiveGameParticipant($participant);
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
     * @return ActiveGameParticipant[]
     */
    public function getBlueSideTeam(): array
    {
        return $this->blueSideTeam;
    }

    /**
     * @return ActiveGameParticipant[]
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
}
