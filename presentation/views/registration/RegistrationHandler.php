<?php
include_once '../../../header.php';
require_once "../../../Autoloader.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$username = $_POST['username'];
$password = $_POST['password'];

$service = new UserBusinessService();


if($service->createUser($firstName, $lastName, $username, $password)){
    include '../../../index.php';
}else{
    include '../login/LoginFailed.php';
}

