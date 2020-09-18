<?php

namespace Thresh\Helper;

use Thresh_Core\Utils\HTTPClient;

/**
 * This class is used to make the API requests
 * @package Thresh\Helper
 */
class Request
{

    /**
     * @param string $url
     * @param string $game
     * @param array $filter
     * @return string
     */
    private static function request(string $url, string $game, array $filter)
    {
        return HTTPClient::getInstance()->get($url, $game, $filter);
    }

    /**
     * Sends a request to the Summoner Endpoint
     * @param string $url
     * @param array $filter
     * @return string
     */
    public static function requestSummonerEndpoint(string $url, $filter = array()){
        return Request::request('summoner/v4/'.$url, 'lol', $filter);
    }

    /**
     * Sends a request to the Champion Mastery Endpoint
     * @param string $url
     * @param array $filter
     * @return string
     */
    public static function requestChampionMasteryEndpoint(string $url, $filter = array()){
        return Request::request('champion-mastery/v4/'.$url, 'lol', $filter);
    }

    /**
     * Sends a request to the League Endpoint
     * @param string $url
     * @param array $filter
     * @return string
     */
    public static function requestLeagueEndpoint(string $url, $filter = array()){
        return Request::request('league/v4/'.$url, 'lol', $filter);
    }

    /**
     * Sends a request to the TFT League Endpoint
     * @param string $url
     * @param array $filter
     * @return string
     */
    public static function requestTftLeagueEndpoint(string $url, $filter = array()){
        return Request::request('league/v1/'.$url, 'tft', $filter);
    }

    /**
     * Sends a request to the Spectator Endpoint
     * @param string $url
     * @param array $filter
     * @return string
     */
    public static function requestSpectatorEndpoint(string $url, $filter = array()){
        return Request::request('spectator/v4/'.$url, 'lol', $filter);
    }

    /**
     * Sends a request to the Match Endpoint
     * @param string $url
     * @param array $filter
     * @return string
     */
    public static function requestMatchEndpoint(string $url, $filter = array()){
        return Request::request('match/v4/'.$url, 'lol', $filter);
    }

    /**
     * Sends a request to the Account Endpoint
     * @param string $url
     * @param array $filter
     * @return string
     */
    public static function requestAccountEndpoint(string $url, $filter = array()){
        return Request::request('account/v1/'.$url, 'riot', $filter);
    }
}
