<?php
include_once '../../../header.php';
require_once '../../../Autoloader.php';
$userID = $_POST['userID'];

$service = new UserBusinessService();

$service->deleteUser($userID);
include 'UserAdmin.php';
