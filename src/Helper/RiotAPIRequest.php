<?php

namespace Thresh\Helper;

use Thresh_Core\Constants\Constants;
use Thresh_Core\Utils\HTTPClient;
use Thresh_Core\Utils\Response;

/**
 * This class is used to make the API requests
 * @package Thresh\Helper
 */
class RiotAPIRequest
{

    /**
     * @param string $url
     * @param string $app
     * @param array $filter
     * @return Response
     */
    private static function request(string $url, string $app, array $filter): Response
    {
        $basePath = '';
        switch ($app){
            case 'lol':
                $basePath = preg_replace('~{platform}~',Config::getPlatform(),Constants::LEAGUE_API_BASE_PATH);
                break;
            case 'tft':
                $basePath = preg_replace('~{platform}~',Config::getPlatform(),Constants::TFT_API_BASE_PATH);
                break;
            case 'riot':
                $basePath = preg_replace('~{region}~',Config::getRegion(),Constants::RIOT_API_BASE_PATH);
                break;
        }
        $api_key = EncryptionUtils::decrypt(Config::getApiKey());
        $params = array_merge(array('api_key' => $api_key), $filter);
        return HTTPClient::getInstance()->get($basePath.$url, $params);
    }

    /**
     * Sends a request to the Summoner Endpoint
     * @param string $url
     * @param array $filter
     * @return Response
     */
    public static function requestLoLSummonerEndpoint(string $url, $filter = array()): Response
    {
        return RiotAPIRequest::request('summoner/v4/'.$url, 'lol', $filter);
    }

    /**
     * Sends a request to the Champion Mastery Endpoint
     * @param string $url
     * @param array $filter
     * @return Response
     */
    public static function requestLoLChampionMasteryEndpoint(string $url, $filter = array()): Response
    {
        return RiotAPIRequest::request('champion-mastery/v4/'.$url, 'lol', $filter);
    }

    /**
     * Sends a request to the League Endpoint
     * @param string $url
     * @param array $filter
     * @return Response
     */
    public static function requestLoLLeagueEndpoint(string $url, $filter = array()): Response
    {
        return RiotAPIRequest::request('league/v4/'.$url, 'lol', $filter);
    }

    /**
     * Sends a request to the TFT League Endpoint
     * @param string $url
     * @param array $filter
     * @return Response
     */
    public static function requestTftLeagueEndpoint(string $url, $filter = array()): Response
    {
        return RiotAPIRequest::request('league/v1/'.$url, 'tft', $filter);
    }

    /**
     * Sends a request to the Spectator Endpoint
     * @param string $url
     * @param array $filter
     * @return Response
     */
    public static function requestLoLSpectatorEndpoint(string $url, $filter = array()): Response
    {
        return RiotAPIRequest::request('spectator/v4/'.$url, 'lol', $filter);
    }

    /**
     * Sends a request to the Match Endpoint
     * @param string $url
     * @param array $filter
     * @return Response
     */
    public static function requestLoLMatchEndpoint(string $url, $filter = array()): Response
    {
        return RiotAPIRequest::request('match/v4/'.$url, 'lol', $filter);
    }

    /**
     * Sends a request to the Account Endpoint
     * @param string $url
     * @param array $filter
     * @return Response
     */
    public static function requestRiotAccountEndpoint(string $url, $filter = array()): Response
    {
        return RiotAPIRequest::request('account/v1/'.$url, 'riot', $filter);
    }
}
