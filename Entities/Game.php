<?php

require_once 'SummonerBasic.php';
require_once 'SummonerGameParticipant.php';

class Game
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
     * @var SummonerGameParticipant[]
     */
    private $participants;

    /**
     * @var int
     */
    private $teamsize;

    /**
     * Game constructor.
     * @param string $summonername
     */
    public function __construct($summonername)
    {
        $summoner = new SummonerBasic($summonername);
        if($summoner->exists()) {
            $game = $this->loadGame($summoner->getId());
            if(!empty($game))
                $this->initiateGame($game);
        }
    }

    public function exists(){
        return !empty($this->getGameId());
    }

    /**
     * @param $summonerId
     * @return mixed
     */
    protected function loadGame($summonerId){
        return @json_decode(@file_get_contents(Constants::$api_basePath."spectator/v4/active-games/by-summoner/" . $summonerId . "?api_key=" . Constants::$key));
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
        $this->participants = array();
        foreach ($participants as $participant){
            $player = new SummonerGameParticipant($participant);
            array_push($this->participants, $player);
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
     * @return SummonerGameParticipant[]
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * @return int
     */
    public function getTeamsize()
    {
        return $this->teamsize;
    }
}