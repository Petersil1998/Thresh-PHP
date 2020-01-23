<?php

namespace src\Helper;

class HTTPClient
{
    private static $httpClient;

    /**
     * @var resource
     */
    private $_curl;

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
     * @return string
     */
    private function request($url){
        curl_setopt($this->_curl, CURLOPT_URL, Constants::API_BASEPATH . $url . "?api_key=" . Config::getConfig("key"));
        curl_setopt($this->_curl, CURLOPT_HEADER  , true);

        $response = curl_exec($this->_curl);

        $httpStatusCode = curl_getinfo($this->_curl, CURLINFO_HTTP_CODE);
        $header_size = curl_getinfo($this->_curl, CURLINFO_HEADER_SIZE);
        $body = substr($response, $header_size);

        if($httpStatusCode == 200){
            return $body;
        } else {
            syslog(LOG_ALERT, sprintf("API Request returned a statusCode other than 200! Status Code: %s%sBody: %s", $httpStatusCode, PHP_EOL, $body));
        }
        return "";
    }

    /**
     * @param $url string
     * @return string
     */
    public function requestSummonerEndpoint($url){
        return $this->request("summoner/v4/summoners/".$url);
    }

    /**
     * @param $url string
     * @return string
     */
    public function requestChampionMasteryEndpoint($url){
        return $this->request("champion-mastery/v4/".$url);
    }

    /**
     * @param $url string
     * @return string
     */
    public function requestLeagueEndpoint($url){
        return $this->request("league/v4/".$url);
    }

    /**
     * @param $url string
     * @return string
     */
    public function requestSpectatorEndpoint($url){
        return $this->request("spectator/v4/".$url);
    }
}
