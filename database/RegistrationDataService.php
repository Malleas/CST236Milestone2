<?php


class RegistrationDataService
{
    public function registerUser($firstName, $lastName, $username, $password)
    {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "INSERT INTO USERS (FIRSTNAME, LASTNAME, USERNAME, PASSWORD) 
        VALUES ('$firstName','$lastName','$username','$password')";

        if ($conn->query($query)) {
            return true;
        } else {
            echo "Error:".$query."<br>".mysqli_error($conn);
            return false;
        }
    }

}