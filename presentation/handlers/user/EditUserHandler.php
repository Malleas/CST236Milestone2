<?php
include_once '../../../header.php';
require_once '../../../Autoloader.php';

$userID = $_POST['userID'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$role = intval($_POST['role']);
$username = $_POST['username'];
$password = $_POST['password'];

$service = new UserBusinessService();

$service->updateUser($userID, $firstName, $lastName, $role, $username, $password);
include "../../views/user/UserAdmin.php";