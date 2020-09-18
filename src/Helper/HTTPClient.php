<?php

namespace Thresh\Helper;

/**
 * This class is used to make the API requests
 * @package Thresh\Helper
 */
class HTTPClient
{
    /**
     * Sends a request to the Summoner Endpoint
     * @param $url string
     * @param array $filter
     * @return string
     */
    public function requestSummonerEndpoint($url, $filter = array()){
        return $this->request('summoner/v4/'.$url, 'lol', $filter);
    }

    /**
     * Sends a request to the Champion Mastery Endpoint
     * @param $url string
     * @param array $filter
     * @return string
     */
    public function requestChampionMasteryEndpoint($url, $filter = array()){
        return $this->request('champion-mastery/v4/'.$url, 'lol', $filter);
    }

    /**
     * Sends a request to the League Endpoint
     * @param $url string
     * @param array $filter
     * @return string
     */
    public function requestLeagueEndpoint($url, $filter = array()){
        return $this->request('league/v4/'.$url, 'lol', $filter);
    }

    /**
     * Sends a request to the TFT League Endpoint
     * @param $url string
     * @param array $filter
     * @return string
     */
    public function requestTftLeagueEndpoint($url, $filter = array()){
        return $this->request('league/v1/'.$url, 'tft', $filter);
    }

    /**
     * Sends a request to the Spectator Endpoint
     * @param $url string
     * @param array $filter
     * @return string
     */
    public function requestSpectatorEndpoint($url, $filter = array()){
        return $this->request('spectator/v4/'.$url, 'lol', $filter);
    }

    /**
     * Sends a request to the Match Endpoint
     * @param $url string
     * @param $filter array
     * @return string
     */
    public function requestMatchEndpoint($url, $filter = array()){
        return $this->request('match/v4/'.$url, 'lol', $filter);
    }

    /**
     * Sends a request to the Account Endpoint
     * @param $url string
     * @param array $filter
     * @return string
     */
    public function requestAccountEndpoint($url, $filter = array()){
        return $this->request('account/v1/'.$url, 'riot', $filter);
    }
}
