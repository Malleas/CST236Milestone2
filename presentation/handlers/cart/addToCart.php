<?php
require_once '../../../Autoloader.php';
require_once '../../../header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$id = $_POST['productID'];
if(isset($_SESSION['cart'])){
    $c = $_SESSION['cart'];
}else{
    if(isset($_SESSION['userID'])){
        $c = new Cart($_SESSION['userID']);
    }else{
        echo "<h2>Please log in first</h2>". "<br>";
        exit;
    }

}

$c->addItem($id);
$c->calcTotal();
$_SESSION['cart'] = $c;

header("Location: ../../views/cart/ShowCart.php");


