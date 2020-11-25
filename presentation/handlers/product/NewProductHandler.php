<?php
include_once '../../../header.php';
require_once '../../../Autoloader.php';

$productName = $_POST['productName'];
$description = $_POST['description'];
$price = floatval($_POST['price']);

$service = new ProductBusinessService();
$service->createProduct($productName, $description, $price);
include '../../../index.php';