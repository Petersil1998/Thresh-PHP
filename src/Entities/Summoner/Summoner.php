<?php

namespace Thresh\Entities\Summoner;

use stdClass;
use Thresh\Helper\HTTPClient;

/**
 * This is the Main Class representing a Summoner
 * @package Thresh\Entities\Summoner
 */
class Summoner
{
    /**
     * @var String
     */
    private $summonername;

    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $profileIcon;

    /**
     * @var string
     */
    private $accountId;

    /**
     * @var string
     */
    private $puuid;

    /**
     * @var int
     */
    private $totalMasteryPoints;

    /**
     * @var int
     */
    private $summonerLevel;

    /**
     * @var int
     */
    private $revisionDate;

    /**
     * @var ChampionMastery[]
     */
    private $championMasteries;

    /**
     * @var Rank
     */
    private $rank_solo_duo;

    /**
     * @var Rank
     */
    private $rank_flex_5v5;

    /**
     * @var Rank
     */
    private $rank_tft;

    /**
     * @var Account
     */
    private $account;

    /**
     * Summoner constructor.
     * @param stdClass $data
     */
    private function __construct($data)
    {
        $data = json_decode($data);
        $this->summonername = $data->name;
        $this->id = $data->id;
        $this->profileIcon = $data->profileIconId;
        $this->accountId = $data->accountId;
        $this->puuid = $data->puuid;
        $this->summonerLevel = $data->summonerLevel;
        $this->revisionDate = $data->revisionDate/1000;
        $this->initRanks();
    }

    /**
     * Gets a Summoner by the name. If no Summoner is found returns false
     * @param string $summonerName
     * @return false|Summoner
     */
    public static function getSummonerByName($summonerName){
        $data = HTTPClient::getInstance()->requestSummonerEndpoint("summoners/by-name/" . $summonerName);
        if (!empty($data)) {
            return new Summoner(json_decode($data));
        }
        return false;
    }

    /**
     * Gets a Summoner by the Account ID. If no Summoner is found returns false
     * @param string $accountID
     * @return false|Summoner
     */
    public static function getSummonerByAccountID($accountID){
        $data = HTTPClient::getInstance()->requestSummonerEndpoint("summoners/by-account/" . $accountID);
        if (!empty($data)) {
            return new Summoner(json_decode($data));
        }
        return false;
    }

    /**
     * Gets a Summoner by the PUUID. If no Summoner is found returns false
     * @param string $puuid
     * @return false|Summoner
     */
    public static function getSummonerByPUUID($puuid){
        $data = HTTPClient::getInstance()->requestSummonerEndpoint("summoners/by-puuid/" . $puuid);
        if (!empty($data)) {
            return new Summoner(json_decode($data));
        }
        return false;
    }

    private function initRanks(){
        $tft = json_decode(HTTPClient::getInstance()->requestTftLeagueEndpoint("entries/by-summoner/".$this->getId()));
        $flexNSoloQ = json_decode(HTTPClient::getInstance()->requestLeagueEndpoint("entries/by-summoner/".$this->getId()));
        $ranks = array_merge($flexNSoloQ, $tft);
        foreach ($ranks as $rank){
            if(isset($rank->queueType)) {
                switch ($rank->queueType) {
                    case "RANKED_SOLO_5x5":
                    {
                        $this->rank_solo_duo = new Rank($rank);
                        break;
                    }
                    case "RANKED_FLEX_SR":
                    {
                        $this->rank_flex_5v5 = new Rank($rank);
                        break;
                    }
                    case "RANKED_TFT":{
                        $this->rank_tft = new Rank($rank);
                        break;
                    }
                }
            }
        }
        $this->setDefaultRanks();
    }

    private function setDefaultRanks(){
        if (empty($this->rank_solo_duo))
            $this->rank_solo_duo = new UnrankedRank();
        if (empty($this->rank_flex_5v5))
            $this->rank_flex_5v5 = new UnrankedRank();
        if (empty($this->rank_tft))
            $this->rank_tft = new UnrankedRank();
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
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getProfileIcon(): int
    {
        return $this->profileIcon;
    }

    /**
     * @return int
     */
    public function getTotalMasteryPoints()
    {
        if(empty($this->totalMasteryPoints)){
            $this->totalMasteryPoints = json_decode(HTTPClient::getInstance()->requestChampionMasteryEndpoint("scores/by-summoner/".$this->getId()));
        }
        return $this->totalMasteryPoints;
    }

    /**
     * @return int
     */
    public function getSummonerLevel()
    {
        return $this->summonerLevel;
    }

    /**
     * @return int
     */
    public function getRevisionDate()
    {
        return $this->revisionDate;
    }

    /**
     * @return ChampionMastery[]
     */
    public function getChampionMasteries()
    {
        if(empty($this->championMasteries)){
            $championMasteries = json_decode(HTTPClient::getInstance()->requestChampionMasteryEndpoint("champion-masteries/by-summoner/".$this->getId()));
            $this->championMasteries = array();
            foreach ($championMasteries as $championMastery){
                $this->championMasteries[] = new ChampionMastery($championMastery);
            }
        }
        return $this->championMasteries;
    }

    /**
     * @return string
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @return string
     */
    public function getPuuid()
    {
        return $this->puuid;
    }

    /**
     * @return Rank
     */
    public function getRankSoloDuo()
    {
        return $this->rank_solo_duo;
    }

    /**
     * @return Rank
     */
    public function getRankFlex5v5()
    {
        return $this->rank_flex_5v5;
    }

    /**
     * @return Rank
     */
    public function getRankTft()
    {
        return $this->rank_tft;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        if(empty($this->account)){
            $this->account = new Account($this->puuid);
        }
        return $this->account;
    }
}
