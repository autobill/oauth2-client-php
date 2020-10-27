<?php

require_once "util/apiCaller.php";

$apiConfig = new ApiConfig();
$apiConfig->accessToken = "";
$apiConfig->saveToFile();
echo "<script type='text/javascript'>window.location.href = 'index.php?msg=Access token has been invalidated'</script>";

?>