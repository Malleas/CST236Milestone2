<?php



class UserDataService
{

    function getAllUsers()
    {
        $db = new Database();
        $query = "Select * From Users";
        $conn = $db->getConnection();

        $result = $conn->query($query);

        if ($result->num_rows == 0) {
            return null;
        } else {
            $allUsersArray = Array();
            while ($user = $result->fetch_assoc()){
                array_push($allUsersArray, $user);
            }
            return $allUsersArray;
        }
    }


}