<?php
require_once '../../../Autoloader.php';
require_once '../../../header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$discountCode = $_POST['discountCode'];
$discountService = new DiscountBusinessService();
$orderService = new OrdersBusinessService();
$codeExists = $discountService->checkIfDiscountExists($discountCode);
$c = $_SESSION['cart'];

unset($_SESSION['discountApplied']);

if ($codeExists == 1) {
    // check if user has used coupon before.  if false, set the session to 1, else session = 0 and return
    $discount = $discountService->getDiscountByCode($discountCode);
    if($orderService->checkDiscount($_SESSION['userID'], $discount->getId()) == 0){
        if($discount->getDiscountDollar() != null && !isset($_SESSION['discountApplied'])){
            $_SESSION['discountCodeID'] = $discount->getId();
            $c->setTotalPrice($c->getTotalPrice() - $discount->getDiscountDollar());
            $_SESSION['cart'] = $c;
            $_SESSION['discountApplied'] = 1;
            header("Location: ../../views/cart/ShowCart.php");
        }else if($discount->getDiscountPercentage() != null && !isset($_SESSION['discountApplied'])){
            $_SESSION['discountCodeID'] = $discount->getId();
            $c->setTotalPrice($c->getTotalPrice() * ((100-$discount->getDiscountPercentage())/100) );
            $_SESSION['cart'] = $c;
            $_SESSION['discountApplied'] = 1;
            header("Location: ../../views/cart/ShowCart.php");
        }else{
            $_SESSION['discountApplied'] = 2;
            header("Location: ../../views/cart/ShowCart.php");
        }

    }else{
        $_SESSION['discountApplied'] = 2;
        header("Location: ../../views/cart/ShowCart.php");
    }

} else {
    $_SESSION['discountApplied'] = 0;
    header("Location: ../../views/cart/ShowCart.php");
}