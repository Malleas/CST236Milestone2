<?php
include_once '../../../header.php';
require_once '../../../Autoloader.php';

$productName = $_POST['productName'];
$description = $_POST['description'];
$price = $_POST['price'];
$navSearch = $_POST['navSearch'];

$service = new ProductBusinessService();

$products = null;

if ( $productName != null && $description == null && $price == null && $navSearch == null){
    $products = Array();
    $products = $service->findProductByName($productName);
    $_SESSION['products'] = $products;
    $_SESSION['principal'] = true;
    include '_productSearchResults.php';
}elseif ($productName == null && $description != null && $price == null && $navSearch == null){
    $products = Array();
    $products = $service->findProductByDescription($description);
    $_SESSION['products'] = $products;
    $_SESSION['principal'] = true;
    include '_productSearchResults.php';
}elseif ($productName == null && $description == null && $price != null && $navSearch == null){
    $products = Array();
    $products = $service->findProductByPrice($price);
    $_SESSION['products'] = $products;
    $_SESSION['principal'] = true;
    include '_productSearchResults.php';
}else if($productName == null && $description == null && $price == null && $navSearch != null){
    $products = Array();
    $products = $service->findProductByName($navSearch);
    if($products == null){
        $products = $service->findProductByDescription($navSearch);
    }
    $_SESSION['products'] = $products;
    $_SESSION['principal'] = true;
    include '_productSearchResults.php';
}else{
    $products = Array();
    $products = $service->getAllProducts();
    $_SESSION['products'] = $products;
    $_SESSION['principal'] = true;
    include "_productSearchResults.php";
}

