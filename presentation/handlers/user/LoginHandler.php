<?php
require_once '../../../header.php';
require_once "../../../Autoloader.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

$service = new SecurityService();
$userService = new UserBusinessService();
$username = $_POST['username'];
$password = $_POST['password'];


if($service->authUser($username, $password)){
    $user = $userService->findUserByUsername($username);
    $_SESSION['userID'] = $user->getId();
    $_SESSION['role'] = $user->getRole();
    $_SESSION['valid'] = 1;
    header ("location:/Milestone/index.php");
   // include '../../../index.php';
}else{
    $_SESSION['loginStatus'] = false;
    include '../../views/login/LoginFailed.php';
}


