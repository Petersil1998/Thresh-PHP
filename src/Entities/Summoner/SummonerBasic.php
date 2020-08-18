<?php

namespace src\Entities\Summoner;

use src\Helper\HTTPClient;

class SummonerBasic
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
     * SummonerBasic constructor.
     * @param string $summonername
     * @param bool $initialze
     */
    public function __construct($summonername = "", $initialze = true)
    {
        if($initialze) {
            $summoner = $this->loadRealSummonerName($summonername);
            if ($this->exists()) {
                $this->initiateSummoner($summoner);
            }
        }
    }

    /**
     * @return bool
     */
    public function exists(){
        return !empty($this->summonername);
    }

    /**
     * @param $summonername
     * @return mixed
     */
    private function loadRealSummonerName($summonername)
    {
        $summoner = HTTPClient::getInstance()->requestSummonerEndpoint("summoners/by-name/" . $summonername);
        $summoner = json_decode($summoner);
        if (!empty($summoner)) {
            $this->summonername = $summoner->name;
            return $summoner;
        }
        return "";
    }

    /**
     * @param mixed $summoner
     */
    protected function initiateSummoner($summoner){
        $this->id = $summoner->id;
        $this->profileIcon = $summoner->profileIconId;
    }

    /**
     * @param string $summonerName
     * @param string $id
     * @param int $profileIcon
     */
    public function setAllFields($summonerName, $id, $profileIcon){
        $this->summonername = $summonerName;
        $this->id = $id;
        $this->profileIcon = $profileIcon;
    }

    /**
     * @return String
     */
    public function getSummonername()
    {
        return $this->summonername;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getProfileIcon()
    {
        return $this->profileIcon;
    }
}
