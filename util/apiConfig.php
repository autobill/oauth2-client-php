<?php

require_once "apiConfig.php";


class ApiConfig {
    var $configFile = null;
    var $apiUrl = null;
    var $appUrl = null;
    var $clientId = null;
    var $clientSecret = null;
    var $refreshToken = null;
    var $accessToken = null;
    var $redirectUrl = null;

    var $tokenRetrieveTryCount = 0;
    function __construct() {
        $this->configFile = 'util/apiConfig.xml';
        $this->loadTokens();
    }

    public function getConnectURL(){
        return$this->appUrl."/api/v1/oauth2/authorize?client_id=". $this->clientId."&redirect_uri=". $this->redirectUrl."&response_type=code";
    }

    private function loadTokens() {
        if (file_exists($this->configFile)) {
            $apiConfig = simplexml_load_file($this->configFile);
            $this->apiUrl = (string)$apiConfig->apiUrl;
            $this->appUrl = (string)$apiConfig->appUrl;
            $this->clientId = (string)$apiConfig->clientId;
            $this->clientSecret = (string)$apiConfig->clientSecret;
            $this->refreshToken = (string)$apiConfig->refreshToken;
            $this->accessToken = (string)$apiConfig->accessToken;
            $this->redirectUrl = (string)$apiConfig->redirectUrl;
        }
        else {
            die("Sorry API Configuration File Not Found!");
        }
    }

    public function saveToFile(){
        $xml = "<?xml version=\"1.0\"?>
<api>
    <apiUrl>".$this->apiUrl."</apiUrl>
    <appUrl>".$this->appUrl."</appUrl>
    <clientId>".$this->clientId."</clientId>
    <clientSecret>".$this->clientSecret."</clientSecret>
    <refreshToken>".$this->refreshToken."</refreshToken>
    <accessToken>".$this->accessToken."</accessToken>
    <redirectUrl>".$this->redirectUrl."</redirectUrl>
</api>";
        $myfile = fopen($this->configFile, "w");
        fwrite($myfile, $xml);
        fclose($myfile);
    }
}
