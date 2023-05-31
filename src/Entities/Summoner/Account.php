<?php

namespace Thresh\Entities\Summoner;

use Thresh\Helper\RiotAPIRequest;

/**
 * This class represents a Riot Account
 * @package Thresh\Entities\Summoner
 */
class Account
{
    /**
     * @var string
     */
    private $gameName;

    /**
     * @var string
     */
    private $tagLine;

    /**
     * Account constructor.
     * @param string $puuid
     */
    public function __construct(string $puuid)
    {
        $account = json_decode(RiotAPIRequest::requestRiotAccountEndpoint('accounts/by-puuid/'.$puuid)->getBody());
        $this->gameName = $account->gameName;
        $this->tagLine = $account->tagLine;
    }

    /**
     * @return string
     */
    public function getGameName(): string
    {
        return $this->gameName;
    }

    /**
     * @return string
     */
    public function getTagLine(): string
    {
        return $this->tagLine;
    }
}