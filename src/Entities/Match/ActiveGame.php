<?php

namespace Thresh\Entities\Match;

use RuntimeException;
use Thresh\Entities\Summoner\SummonerBasic;
use Thresh\Entities\Summoner\ActiveGameParticipant;
use Thresh\Helper\HTTPClient;

/**
 * This class represents an active Game of a Summoner
 * @package Thresh\Entities\Match
 */
class ActiveGame
{
    /**
     * @var float
     */
    private $gameId;

    /**
     * @var int
     */
    private $mapId;

    /**
     * @var string
     */
    private $gameMode;

    /**
     * @var string
     */
    private $gameType;

    /**
     * @var int
     */
    private $gameQueueConfigId;

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
     * @param SummonerBasic $summoner
     */
    public function __construct($summoner)
    {
        if($summoner->exists()) {
            $game = json_decode(HTTPClient::getInstance()->requestSpectatorEndpoint("active-games/by-summoner/" . $summoner->getId()));
            if(!empty($game)) {
                $this->initiateGame($game);
            }
        }
    }

    public function exists(){
        return !empty($this->getGameId());
    }

    /**
     * @param mixed $game
     */
    protected function initiateGame($game){
        $this->gameId = $game->gameId;
        $this->mapId = $game->mapId;
        $this->gameMode = $game->gameMode;
        $this->gameType = $game->gameType;
        $this->gameQueueConfigId = $game->gameQueueConfigId;
        $this->teamsize = (count($game->participants)) / 2;
        $this->loadParticipants($game->participants);
    }

    /**
     * @param array $participants
     */
    protected function loadParticipants($participants){
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
     * @return float
     */
    public function getGameId()
    {
        return $this->gameId;
    }

    /**
     * @return int
     */
    public function getMapId()
    {
        return $this->mapId;
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
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return $this->gameQueueConfigId;
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
