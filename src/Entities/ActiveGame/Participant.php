<?php

namespace Thresh\Entities\ActiveGame;

use stdClass;
use Thresh_Core\Collections\Champions;
use Thresh_Core\Collections\Runes;
use Thresh_Core\Collections\RuneStyles;
use Thresh_Core\Collections\SummonerSpells;
use Thresh_Core\Objects\Champions\Champion;
use Thresh_Core\Objects\Runes\Rune;
use Thresh_Core\Objects\Runes\RuneStyle;
use Thresh_Core\Objects\SummonerSpell;

/**
 * Class SummonerGameParticipant
 * @package Thresh\Entities\Summoner
 */
class Participant
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
     * @var SummonerSpell
     */
    private $summonerSpell1;

    /**
     * @var SummonerSpell
     */
    private $summonerSpell2;

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
     * @param stdClass $participantData
     */
    public function __construct(stdClass $participantData)
    {
        $this->summonername = $participantData->summonerName;
        $this->summonerID = $participantData->summonerId;
        $this->profileIcon = $participantData->profileIconId;
        $this->isBot = $participantData->bot;
        $this->champion = Champions::getChampion($participantData->championId);
        $this->teamId = $participantData->teamId;
        $this->summonerSpell1 = SummonerSpells::getSummonerSpell($participantData->spell1Id);
        $this->summonerSpell2 = SummonerSpells::getSummonerSpell($participantData->spell2Id);
        $this->runeStyle = RuneStyles::getRuneStyle($participantData->perks->perkStyle);
        $this->runeSubStyle = RuneStyles::getRuneStyle($participantData->perks->perkSubStyle);
        $runes = array();
        foreach ($participantData->perks->perkIds as $perkId) {
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
     * @return SummonerSpell
     */
    public function getSummonerSpell1()
    {
        return $this->summonerSpell1;
    }

    /**
     * @return SummonerSpell
     */
    public function getSummonerSpell2()
    {
        return $this->summonerSpell2;
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