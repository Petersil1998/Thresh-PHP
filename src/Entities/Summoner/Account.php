<?php

namespace Thresh\Entities\Summoner;

use Thresh\Helper\HTTPClient;

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
        $account = json_decode(HTTPClient::getInstance()->requestAccountEndpoint('accounts/by-puuid/'.$puuid));
        $this->gameName = $account->gameName;
        $this->tagLine = $account->tagLine;
    }
}