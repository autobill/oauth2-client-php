<?php

require_once "util/apiCaller.php";

$apiCaller = new ApiCaller();
if(!array_key_exists("code",$_REQUEST)){
    echo "<script type='text/javascript'>window.location.href = 'index.php?msg=Invalid parameters.'</script>";
}else{
    $code = $_REQUEST["code"];
    $data = $apiCaller->getAccessToken($code);
    if($data == null){
        echo "<script type='text/javascript'>window.location.href = 'index.php?msg=Could not connect. Please confirm if API URL is valid.'</script>";
    }
    $apiConfig = new ApiConfig();
    $apiConfig->accessToken = $data->access_token;
    $apiConfig->refreshToken = $data->refresh_token;
    $apiConfig->saveToFile();
    echo "<script type='text/javascript'>window.location.href = 'index.php?msg=Connected successfully.'</script>";
}


?>