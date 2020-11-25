<?php
require_once '../../../Autoloader.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$id = $_POST['productID'];
echo $id;
if(isset($_SESSION['cart'])){
    $c = $_SESSION['cart'];
}else{
    if(isset($_SESSION['userID'])){
        $c = new Cart($_SESSION['userID']);
    }else{
        echo "Please log in first <br>";
        exit;
    }

}

$c->addItem($id);
$c->calcTotal();

echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";

$_SESSION['cart'] = $c;

//header("Location: ../views/showCart.php");

