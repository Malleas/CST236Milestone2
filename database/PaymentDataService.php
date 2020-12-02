<?php


class PaymentDataService
{

    private $conn;

    /**
     * PaymentDataService constructor.
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    public function authPayment($n, $expMonth, $expYear, $cvv, $userID)
    {
        $query = "Select * from PAYMENT where CREDIT_CART_NUMBER = ? and EXPIRATION_MONTH = ? and EXPIRATION_YEAR = ? 
                        and CVV = ? and USERS_ID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssss", $n, $expMonth, $expYear, $cvv, $userID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return 1;
        } else {
            return 0;
        }
    }
}