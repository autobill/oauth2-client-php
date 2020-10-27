<?php

require_once "util/apiCaller.php";

$apiCaller = new ApiCaller();
$data = $apiCaller->renewAccessToken();

$apiConfig = new ApiConfig();
$apiConfig->accessToken = $data->access_token;
$apiConfig->refreshToken = $data->refresh_token;
$apiConfig->saveToFile();
echo "<script type='text/javascript'>window.location.href = 'index.php?msg=Access token has been renewed'</script>";

?>