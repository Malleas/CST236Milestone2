<?php
require_once '../header.php';
require_once "../../../Autoloader.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

$service = new SecurityService();
$username = $_POST['username'];
$password = $_POST['password'];


if($service->authUser($username, $password)){
    $_SESSION['principal'] = true;
    include '../searchPortal/Search.html';
}else{
    $_SESSION['principal'] = false;
    include 'LoginFailed.php';
}


