<?php

namespace Thresh\Entities\Summoner;

use stdClass;
use Thresh\Collections\Champions;
use Thresh\Collections\Runes;
use Thresh\Collections\RuneStyles;
use Thresh\Entities\Champions\Champion;
use Thresh\Entities\Runes\Rune;
use Thresh\Entities\Runes\RuneStyle;

/**
 * Class SummonerGameParticipant
 * @package Thresh\Entities\Summoner
 */
class ActiveGameParticipant
{
    /**
     * @var String
     */
    private $summonername;

    /**
     * @var string
     */
    private $summonerID;

    /**
     * @var int
     */
    private $profileIcon;

    /**
     * @var bool
     */
    private $isBot;

    /**
     * @var Champion
     */
    private $champion;

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
     * @param stdClass $data
     */
    public function __construct($data)
    {
        $this->summonername = $data->summonerName;
        $this->summonerID = $data->summonerId;
        $this->profileIcon = $data->profileIconId;
        $this->isBot = $data->bot;
        $this->champion = Champions::getChampion($data->championId);
        $this->teamId = $data->teamId;
        $this->spell1Id = $data->spell1Id;
        $this->spell2Id = $data->spell2Id;
        $this->runeStyle = RuneStyles::getRuneStyle($data->perks->perkStyle);
        $this->runeSubStyle = RuneStyles::getRuneStyle($data->perks->perkSubStyle);
        $runes = array();
        foreach ($data->perks->perkIds as $perkId) {
            $runes[] = Runes::getRune($perkId);
        }
        $this->runes = $runes;
    }

    /**
     * @return String
     */
    public function getSummonername(): string
    {
        return $this->summonername;
    }

    /**
     * @return string
     */
    public function getSummonerID(): string
    {
        return $this->summonerID;
    }

    /**
     * @return int
     */
    public function getProfileIcon(): int
    {
        return $this->profileIcon;
    }

    /**
     * @return bool
     */
    public function isBot()
    {
        return $this->isBot;
    }

    /**
     * @return Champion
     */
    public function getChampion()
    {
        return $this->champion;
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