<?php

require_once 'SummonerBasic.php';
require_once 'Rank.php';
require_once 'ChampionMastery.php';

class Summoner extends SummonerBasic
{
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
    private $rank_flex_3v3;

    /**
     * @var Rank
     */
    private $rank_tft;

    /**
     * Summoner constructor.
     * @param string $summonername
     */
    public function __construct($summonername)
    {
        parent::__construct($summonername);
    }

    protected function initiateSummoner($summoner){
        parent::initiateSummoner($summoner);
        $this->accountId = $summoner->accountId;
        $this->puuid = $summoner->puuid;
        $this->summonerLevel = intval($summoner->summonerLevel);
        $this->revisionDate = intval($summoner->revisionDate)/1000;
        $this->totalMasteryPoints = intval(json_decode(HTTPClient::getInstance()->requestChampionMasteryEndpoint("by-summoner/".$this->getId())));
        $this->initChampionMasteries();
        $this->initRanks();
    }

    protected function initChampionMasteries(){
        //$championMasteries =
    }

    protected function initRanks(){
        $ranks = json_decode(HTTPClient::getInstance()->requestLeagueEndpoint("entries/by-summoner/".$this->getId()));
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
                    case "RANKED_FLEX_TT":
                    {
                        $this->rank_flex_3v3 = new Rank($rank);
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

    protected function setDefaultRanks(){
        if (empty($this->rank_solo_duo))
            $this->rank_solo_duo = new Rank('Unranked');
        if (empty($this->rank_flex_5v5))
            $this->rank_flex_5v5 = new Rank('Unranked');
        if (empty($this->rank_flex_3v3))
            $this->rank_flex_3v3 = new Rank('Unranked');
        if (empty($this->rank_tft))
            $this->rank_tft = new Rank('Unranked');
    }

    /**
     * @return int
     */
    public function getTotalMasteryPoints()
    {
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
    public function getRankFlex3v3()
    {
        return $this->rank_flex_3v3;
    }

    /**
     * @return Rank
     */
    public function getRankTft()
    {
        return $this->rank_tft;
    }
}
