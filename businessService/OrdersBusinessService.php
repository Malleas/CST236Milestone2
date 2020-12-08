<?php


class OrdersBusinessService
{
    public function proccessOrder($userID, $cart, $totalProducts, $n, $expMonth, $expYear, $cvv){
        $db = new Database();
        $conn = $db->getConnection();
        $orderService = new OrderDataService($conn);
        $addressService = new AddressDataService($conn);
        $paymentService = new PaymentDataService($conn);
        $productService = new ProductDataService();
        $conn->autocommit(false);
        $conn->begin_transaction();
        //get address for user
        $address = $addressService->getAddress($userID);
        //create a new order using address and userID
        $orderStatus = $orderService->createOrder($address->getId(), $userID);
        //get order ID after creation
        $order = $orderService->getOrderID($userID);
        $orderID = $order->getId();
        //foreach loop for each item in card to be added to order details
        $orderDetailsStatus = 0;
        foreach ($cart->getItems() as $productID => $qty){
            $product = $productService->findProductByID($productID);
            $orderService->updateOrderDetails($qty, $product->getPrice(), $product->getDescription(), $productID, $orderID);
            $orderDetailsStatus ++;
        }
        //process payment
        $paymentStatus = $paymentService->authPayment($n, $expMonth, $expYear, $cvv, $userID);
        if($orderStatus == 1 && $orderDetailsStatus == $totalProducts && $paymentStatus == 1){
            $conn->commit();
            echo "Transaction complete, thanks for your order! <br>";
            return 1;

        }else{
            $conn->rollback();
            echo "There was a problem processing your order <BR>";
            return 0;
        }
    }

    public function getOrderByID($orderID){
        $db = new Database();
        $conn = $db->getConnection();
        $orderService = new OrderDataService($conn);
        return $orderService->getOrderByID($orderID);
    }

}