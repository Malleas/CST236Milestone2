<?php


class OrderDataService
{
    private $conn;

    /**
     * OrderDataService constructor.
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    public function createOrder($addressID, $userID)
    {
        $query = "Insert into ORDERS (ADDRESSES_ID, ADDRESSES_USERS_ID) VALUE (?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $addressID, $userID);


        if ($stmt->execute()) {
            return 1;
        } else {
            return 0;
        }

    }

    public function getOrderID($userID)
    {
        $query = "Select * from ORDERS where ADDRESSES_USERS_ID = ? ORDER BY ID DESC limit 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $userID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            return 0;
        } else {
            $orders = array();
            while ($order = $result->fetch_assoc()) {
                array_push($orders, $order);
            }
            $o = new Order($orders[0]['ID'], $orders[0]['DATE'], $orders[0]['ADDRESSES_ID'], $orders[0]['ADDRESSES_USERS_ID']);
            return $o;
        }
    }

    public function updateOrderDetails($qty, $p, $d, $prodID, $orderID)
    {
        $query = "Insert into ORDER_DETAILS (QUANTITY, CURRENT_PRICE, CURRENT_DESCRIPTION, PRODUCTS_ID, ORDERS_ID) 
                    VALUE (?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("idsii", $qty, $p, $d, $prodID, $orderID);


        if ($stmt->execute()) {
            return 1;
        } else {
            return 0;
        }

    }

    public function getOrderByID($orderID){
        $query = "Select * from ORDERS 
                  inner join ORDER_DETAILS OD on ORDERS.ID = OD.ORDERS_ID
                  inner join PRODUCTS P on OD.PRODUCTS_ID = P.ID
                  where ORDERS.ID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $orderID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            return null;
        } else {
            $completedOrder = array();
            while ($order = $result->fetch_assoc()) {
                array_push($completedOrder, $order);
            }
             return $completedOrder;
        }
    }
}