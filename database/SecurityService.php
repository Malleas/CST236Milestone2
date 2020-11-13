<?php


class SecurityService
{

    function authUser($username, $password)
    {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "SELECT * FROM USERS WHERE USERNAME = '$username' && PASSWORD = '$password'";
        $results = $conn->query($query);

        if ($results->num_rows == 1) {
            return true;
        } else {
            return false;
        }
        $conn->close();
    }

}