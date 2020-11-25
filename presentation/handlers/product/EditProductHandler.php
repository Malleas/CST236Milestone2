<?php
include_once '../../../header.php';
require_once '../../../Autoloader.php';

$productID = $_POST['productID'];
$productName = $_POST['productName'];
$description = $_POST['description'];
$price = $_POST['price'];

$service = new ProductBusinessService();

$service->updateProduct($productID, $productName, $description, $price);
include '../../views/product/ProductAdmin.php';


