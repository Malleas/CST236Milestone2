<?php
include_once '../header.php';
require_once "../../../Autoloader.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$username = $_POST['username'];
$password = $_POST['password'];

$service = new RegistrationBusinessService();


if($service->registerUser($firstName, $lastName, $username, $password)){
    $_SESSION['principal'] = true;
    include '../searchPortal/Search.html';
}else{
    $_SESSION['principal'] = false;
    include '../login/LoginFailed.php';
}
