<?php
include_once '../../../header.php';
require_once '../../../Autoloader.php';

$productID = $_POST['productID'];

$service = new ProductBusinessService();

$service->deleteProduct($productID);
include '../../views/product/ProductAdmin.php';