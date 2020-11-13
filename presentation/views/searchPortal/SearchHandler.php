<?php
include_once '../header.php';
require_once '../../../Autoloader.php';

$productID = $_POST['productID'];
$productName = $_POST['productName'];
$description = $_POST['description'];
$price = $_POST['price'];

$service = new ProductBusinessService();

$products = null;

if($productID != null && $productName == null && $description == null && $price == null){
    $products = Array();
    $products = $service->findProductByID($productID);
    $_SESSION['products'] = $products;
    include '_productSearchResults.php';
}elseif ($productID == null && $productName != null && $description == null && $price == null){
    $products = Array();
    $products = $service->findProductByName($productName);
    $_SESSION['products'] = $products;
    include '_productSearchResults.php';
}elseif ($productID == null && $productName == null && $description != null && $price == null){
    $products = Array();
    $products = $service->findProductByDescription($description);
    $_SESSION['products'] = $products;
    include '_productSearchResults.php';
}elseif ($productID == null && $productName == null && $description == null && $price != null){
    $products = Array();
    $products = $service->findProductByPrice($price);
    $_SESSION['products'] = $products;
    include '_productSearchResults.php';
}else{
    $products = Array();
    $products = $service->getAllProducts();
    $_SESSION['products'] = $products;
    include "_productSearchResults.php";
}