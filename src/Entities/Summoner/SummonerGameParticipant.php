<?php

namespace Thresh\Entities\Summoner;

use Thresh\Collections\Runes;
use Thresh\Collections\RuneStyles;
use Thresh\Entities\Runes\Rune;
use Thresh\Entities\Runes\RuneStyle;

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
     * @var Rune[]
     */
    private $runes;

    /**
     * @var RuneStyle
     */
    private $runeStyle;

    /**
     * @var RuneStyle
     */
    private $runeSubStyle;

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
        $this->runeStyle = RuneStyles::getRuneStyle($player->perks->perkStyle);
        $this->runeSubStyle = RuneStyles::getRuneStyle($player->perks->perkSubStyle);
        $runes = array();
        foreach ($player->perks->perkIds as $perkId) {
            $runes[] = Runes::getRune($perkId);
        }
        $this->runes = $runes;
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
     * @return Rune[]
     */
    public function getRunes()
    {
        return $this->runes;
    }

    /**
     * @return RuneStyle
     */
    public function getRuneStyle()
    {
        return $this->runeStyle;
    }

    /**
     * @return RuneStyle
     */
    public function getRuneSubStyle()
    {
        return $this->runeSubStyle;
    }
}