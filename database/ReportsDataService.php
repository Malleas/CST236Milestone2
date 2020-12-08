<?php


class ReportsDataService
{
    private $conn;

    /**
     * ReportsDataService constructor.
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    public function getSales($startDate, $endDate)
    {
        $query = "select * from ORDERS
                    inner join ORDER_DETAILS OD on ORDERS.ID = OD.ORDERS_ID
                    inner join PRODUCTS P on OD.PRODUCTS_ID = P.ID
                    where DATE between ? and ? order by QUANTITY desc";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $startDate, $endDate);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            return null;
        } else {
            $orders = array();
            while ($order = $result->fetch_assoc()) {
                array_push($orders, $order);
            }

            return $orders;
        }
    }



}