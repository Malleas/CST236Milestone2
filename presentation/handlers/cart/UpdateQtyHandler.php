<?php
require_once "../../../Autoloader.php";
require_once "../../../header.php";

$qty = $_POST['quantity'];
$productID = $_POST['productID'];

if(isset($_SESSION['cart'])){
    $c = $_SESSION['cart'];
    $c->updateQty($productID, $qty);
    $c->calcTotal();
    header("Location:../../views/cart/ShowCart.php");
    $_SESSION['cart'] = $c;
}else {
    echo "Please ensure you are logged in to update your cary <br>";
    echo "<input type='button' class='btn btn-primary' value='Login' onclick='relocate()' >";
    exit;
}



?>

<script>
    function relocate(){
        location.href = "../../views/login/Login.php"

    }
</script>
