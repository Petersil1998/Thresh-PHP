<?php

namespace src\Entities;

class SummonerGameParticipant extends SummonerBasic
{
    /**
     * @var bool
     */
    private $isBot;

    /**
     * @var int
     */
    private $championId;

    /**
     * @var int
     */
    private $teamId;

    /**
     * @var int
     */
    private $spell1Id;

    /**
     * @var int
     */
    private $spell2Id;

    /**
     * @var mixed
     */
    private $perkIds;

    /**
     * SummonerGameParticipant constructor.
     * @param mixed $player
     */
    public function __construct($player)
    {
        parent::__construct("", false);
        parent::setAllFields($player->summonerName, $player->summonerId, $player->profileIconId);
        $this->initiatePlayer($player);
    }


    protected function initiatePlayer($player)
    {
        $this->isBot = $player->bot;
        $this->championId = $player->championId;
        $this->teamId = $player->teamId;
        $this->spell1Id = $player->spell1Id;
        $this->spell2Id = $player->spell2Id;
        $this->perkIds = $player->perks->perkIds;
    }

    /**
     * @return bool
     */
    public function isBot()
    {
        return $this->isBot;
    }

    /**
     * @return int
     */
    public function getChampionId()
    {
        return $this->championId;
    }

    /**
     * @return int
     */
    public function getTeamId()
    {
        return $this->teamId;
    }

    /**
     * @return int
     */
    public function getSpell1Id()
    {
        return $this->spell1Id;
    }

    /**
     * @return int
     */
    public function getSpell2Id()
    {
        return $this->spell2Id;
    }

    /**
     * @return mixed
     */
    public function getPerks()
    {
        return $this->perkIds;
    }
}