<?php

namespace Thresh\Helper;

use Thresh\Constants\Constants;

/**
 * This class is used to make the API requests
 * @package Thresh\Helper
 */
class HTTPClient
{
    private static $httpClient;

    /**
     * @var resource
     */
    private $_curl;

    /**
     * Returns an instance of HTTPClient
     * @return HTTPClient
     */
    public static function getInstance(){
        if(self::$httpClient === null){
            self::$httpClient = new HTTPClient();
        }
        return self::$httpClient;
    }

    private function __construct()
    {
        $this->_curl = curl_init();
        curl_setopt($this->_curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->_curl, CURLOPT_HTTPGET, 1);
    }

    public function __destruct()
    {
        curl_close($this->_curl);
    }

    /**
     * @param $url string
     * @param $game string
     * @param $extraData array
     * @return string
     */
    private function request($url, $game, $extraData = array()){
        $basePath = '';
        switch ($game){
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
        curl_setopt($this->_curl, CURLOPT_URL, $basePath . $url .
            '?api_key=' . $api_key.'&'.$this->buildParameters($extraData));
        curl_setopt($this->_curl, CURLOPT_HEADER  , true);

        $response = curl_exec($this->_curl);

        $httpStatusCode = curl_getinfo($this->_curl, CURLINFO_HTTP_CODE);
        $header_size = curl_getinfo($this->_curl, CURLINFO_HEADER_SIZE);
        $body = substr($response, $header_size);

        if($httpStatusCode == 200){
            return $body;
        } else {
            syslog(LOG_ALERT,
                sprintf('API Request returned a statusCode other than 200! Status Code: %s%sBody: %s',
                    $httpStatusCode,
                    PHP_EOL,
                    $body));
        }
        return '';
    }

    /**
     * @param array $array
     * @param false $qs
     * @return string
     */
    private function buildParameters($array, $qs = false) {
        $parts = array();
        if ($qs) {
            $parts[] = $qs;
        }
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $value2) {
                    $parts[] = http_build_query(array($key => $value2));
                }
            } else {
                $parts[] = http_build_query(array($key => $value));
            }
        }
        return join('&', $parts);
    }

    /**
     * Sends a request to the Summoner Endpoint
     * @param $url string
     * @return string
     */
    public function requestSummonerEndpoint($url){
        return $this->request('summoner/v4/'.$url, 'lol');
    }

    /**
     * Sends a request to the Champion Mastery Endpoint
     * @param $url string
     * @return string
     */
    public function requestChampionMasteryEndpoint($url){
        return $this->request('champion-mastery/v4/'.$url, 'lol');
    }

    /**
     * Sends a request to the League Endpoint
     * @param $url string
     * @return string
     */
    public function requestLeagueEndpoint($url){
        return $this->request('league/v4/'.$url, 'lol');
    }

    /**
     * Sends a request to the TFT League Endpoint
     * @param $url string
     * @return string
     */
    public function requestTftLeagueEndpoint($url){
        return $this->request('league/v1/'.$url, 'tft');
    }

    /**
     * Sends a request to the Spectator Endpoint
     * @param $url string
     * @return string
     */
    public function requestSpectatorEndpoint($url){
        return $this->request('spectator/v4/'.$url, 'lol');
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
     * @return string
     */
    public function requestAccountEndpoint($url){
        return $this->request('account/v1/'.$url, 'riot');
    }
}
