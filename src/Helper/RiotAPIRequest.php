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
     * @param string $app {@see AppType}
     * @param string $type {@see RoutingType}
     * @param array $filter
     * @return Response
     */
    private static function request(string $url, string $app, string $type, array $filter): Response
    {
        $basePath = Constants::API_BASE_PATH.$app.'/';
        switch ($type) {
            case RoutingType::PLATFORM:
                $basePath = preg_replace('~{}~',Config::getPlatform(), $basePath);
                break;
            case RoutingType::REGION:
                $basePath = preg_replace('~{}~',Config::getRegion(), $basePath);
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
        return RiotAPIRequest::request('summoner/v4/'.$url, AppType::LOL, RoutingType::PLATFORM, $filter);
    }

    /**
     * Sends a request to the Champion Mastery Endpoint
     * @param string $url
     * @param array $filter
     * @return Response
     */
    public static function requestLoLChampionMasteryEndpoint(string $url, $filter = array()): Response
    {
        return RiotAPIRequest::request('champion-mastery/v4/'.$url, AppType::LOL, RoutingType::PLATFORM, $filter);
    }

    /**
     * Sends a request to the League Endpoint
     * @param string $url
     * @param array $filter
     * @return Response
     */
    public static function requestLoLLeagueEndpoint(string $url, $filter = array()): Response
    {
        return RiotAPIRequest::request('league/v4/'.$url, AppType::LOL, RoutingType::PLATFORM, $filter);
    }

    /**
     * Sends a request to the TFT League Endpoint
     * @param string $url
     * @param array $filter
     * @return Response
     */
    public static function requestTftLeagueEndpoint(string $url, $filter = array()): Response
    {
        return RiotAPIRequest::request('league/v1/'.$url, AppType::TFT, RoutingType::PLATFORM, $filter);
    }

    /**
     * Sends a request to the Spectator Endpoint
     * @param string $url
     * @param array $filter
     * @return Response
     */
    public static function requestLoLSpectatorEndpoint(string $url, $filter = array()): Response
    {
        return RiotAPIRequest::request('spectator/v4/'.$url, AppType::LOL, RoutingType::PLATFORM, $filter);
    }

    /**
     * Sends a request to the Match Endpoint
     * @param string $url
     * @param array $filter
     * @return Response
     */
    public static function requestLoLMatchEndpoint(string $url, $filter = array()): Response
    {
        return RiotAPIRequest::request('match/v5/'.$url, AppType::LOL, RoutingType::REGION, $filter);
    }

    /**
     * Sends a request to the Account Endpoint
     * @param string $url
     * @param array $filter
     * @return Response
     */
    public static function requestRiotAccountEndpoint(string $url, $filter = array()): Response
    {
        return RiotAPIRequest::request('account/v1/'.$url, AppType::RIOT, RoutingType::PLATFORM, $filter);
    }
}

class AppType {
    const RIOT = "riot";
    const LOL = "lol";
    const TFT = "tft";
}

class RoutingType {
    const PLATFORM = "platform";
    const REGION = "region";
}
