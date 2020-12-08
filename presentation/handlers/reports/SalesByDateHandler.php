<?php

require_once '../../../Autoloader.php';
require_once '../../../header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$orderID = $_POST['orderID'];

$orderService = new OrdersBusinessService();
$order = $orderService->getOrderByID($orderID);

include "../../views/orders/OrderDetails.php";
