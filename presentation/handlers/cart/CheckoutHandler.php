<?php
require_once '../../../Autoloader.php';
require_once '../../../header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$c = $_SESSION['cart'];
$userID = $_SESSION['userID'];
$number = $_POST['number'];
$expMonth = $_POST['expirationMonth'];
$expYear = $_POST['expirationYear'];
$cvv = $_POST['cvv'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$discountCodeID = $_SESSION['discountCodeID'];
$totalProducts = 0;
$orderService = new OrdersBusinessService();

foreach ($c->getItems() as $productID => $qty){
    $totalProducts ++;
}

$transResults = $orderService->proccessOrder($userID, $c, $totalProducts, $number, $expMonth, $expYear, $cvv, $discountCodeID);

if($transResults == 1){
    unset($_SESSION['cart']);
}


