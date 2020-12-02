<?php


class AddressDataService
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

    public function getAddress($userID)
    {
        $query = "Select * from ADDRESSES where USERS_ID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $userID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            return 0;
        } else {
            $addresses = array();
            while ($address = $result->fetch_assoc()) {
                array_push($addresses, $address);
            }
            $a = new Address($addresses[0]["ID"], $addresses[0]["ADDRESS_TYPE"], $addresses[0]["IS_PRIMARY"], $addresses[0]["STREET"],
                $addresses[0]["CITY"], $addresses[0]["STATE"], $addresses[0]["ZIPCODE"], $addresses[0]["USERS_ID"]);
            return $a;
        }
    }
}