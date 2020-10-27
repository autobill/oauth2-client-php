<?php
require_once "apiConfig.php";

class ApiCaller{
    var $apiConfig = null;
    function __construct() {
        $this->apiConfig = new ApiConfig();
    }
    public function processViaCurl($url)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->apiConfig->apiUrl.$url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer ".$this->apiConfig->accessToken,
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            if($response == null){
                return null;
            }
            $data = json_decode($response);
            if(!property_exists($data,"errors")){
                return $data;
            }else{
                return null;
            }
        }
        return null;
    }

    public function getAccountList(){
        $data = $this->processViaCurl("/api/v1/accounts");
        if($data != null){
            return $data->accounts;
        }
        return null;
    }

    public function getAccessToken($code){
        $curl = curl_init();
        $client_id = $this->apiConfig->clientId;
        $client_secret = $this->apiConfig->clientSecret;
        $redirect_url = $this->apiConfig->redirectUrl;

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->apiConfig->apiUrl."/api/v1/oauth2/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "code=".urlencode($code).
                "&grant_type=authorization_code".
                "&client_id=".urlencode($client_id).
                "&client_secret=".urlencode($client_secret).
                "&redirect_uri=".urlencode($redirect_url),
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
        return null;
    }

    public function renewAccessToken(){
        $curl = curl_init();
        $client_id = $this->apiConfig->clientId;
        $client_secret = $this->apiConfig->clientSecret;
        $redirect_url = $this->apiConfig->redirectUrl;
        $refresh_token = $this->apiConfig->refreshToken;

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->apiConfig->apiUrl."/api/v1/oauth2/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "refresh_token=".urlencode($refresh_token).
                "&grant_type=refresh_token".
                "&client_id=".urlencode($client_id).
                "&client_secret=".urlencode($client_secret).
                "&redirect_uri=".urlencode($redirect_url),
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
        return null;
    }

}

?>