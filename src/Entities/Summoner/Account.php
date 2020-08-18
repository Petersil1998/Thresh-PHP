<?php


namespace src\Entities\Summoner;


use src\Helper\HTTPClient;

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