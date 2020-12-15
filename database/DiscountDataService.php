<?php


class DiscountDataService
{
    private $conn;

    /**
     * DiscountDataService constructor.
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function checkIfDiscountExists($code){
        $query = "Select * from DISCOUNTS where DISCOUNT_CODE = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $code);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows == 0){
            return 0;
        }else{
            return 1;
        }
    }

    public function getDiscountByCode($code){
        $query = "Select * from DISCOUNTS where DISCOUNT_CODE = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $code);
        $stmt->execute();
        $results = $stmt->get_result();

        if($results->num_rows == 0){
            return 0;
        }else{
            $discounts = array();
            while ($discount = $results->fetch_assoc()) {
                array_push($discounts, $discount);
            }
            $d = new Discount($discounts[0]['ID'], $discounts[0]['DISCOUNT_CODE'], $discounts[0]['DISCOUNT_DOLLAR'], $discounts[0]['DISCOUNT_PERCENTAGE']);
            return $d;
        }
    }


}