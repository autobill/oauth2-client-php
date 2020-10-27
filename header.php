<?php
    require_once "util/apiCaller.php";
    $msg = null;
    if(array_key_exists("msg",$_REQUEST)){
        $msg = $_REQUEST["msg"];
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="favicon.ico"/>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <title>AutoBill Simple CRUD</title>
</head>
<body>
<?php
    if($msg != null){
?>
        <div class="alert-container" id="alertBox">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong><?php echo $msg; ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="document.getElementById('alertBox').remove()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
<?php
    }
?>
<div class="jumbotron text-center">
    <h1>AutoBill Mini Client</h1>
    <div class="row">
        <div class="col-sm-12">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="account.php">Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="README.md">README.md</a>
                </li>
            </ul>
        </div>
    </div>
</div>