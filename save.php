<?php
    require_once "util/apiConfig.php";
    $apiConfig = new ApiConfig();
    $apiConfig->apiUrl = trim($_REQUEST["apiUrl"]);
    $apiConfig->appUrl = trim($_REQUEST["appUrl"]);
    $apiConfig->clientId = trim($_REQUEST["clientId"]);
    $apiConfig->clientSecret = trim($_REQUEST["clientSecret"]);
    $apiConfig->redirectUrl = trim($_REQUEST["redirectUrl"]);
    $apiConfig->saveToFile();
    echo "<script type='text/javascript'>window.location.href = 'index.php?msg=Parameters have been saved'</script>";
?>
