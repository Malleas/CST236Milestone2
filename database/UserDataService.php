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
            $allUsersArray = array();
            while ($user = $result->fetch_assoc()) {
                array_push($allUsersArray, $user);
            }
           return $allUsersArray;
        }
    }

    public function findUserByID($id)
    {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "Select * From Users where ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            return null;
        } else {
            $users = Array();
            while ($user = $result->fetch_assoc()){
                array_push($users, $user);
            }
            $u = new User($users[0]["ID"], $users[0]["FIRSTNAME"], $users[0]["LASTNAME"], $users[0]["ROLE"], $users[0]["USERNAME"], $users[0]["PASSWORD"]);
            return $u;
        }
    }

    public function updateUser($id, $f, $l, $r, $u, $p){
        $db = new Database();
        $conn = $db->getConnection();
        $query = "UPDATE USERS SET FIRSTNAME = ?, LASTNAME = ?, ROLE = ?, USERNAME = ?, PASSWORD = ? WHERE ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssisss", $f, $l, $r, $u, $p, $id);
        if ( $stmt->execute()) {
            return true;
        } else {
            echo "Error:".$query."<br>".mysqli_error($conn);
            return false;
        }
    }

    public function deleteUser($id){
        $db = new Database();
        $conn = $db->getConnection();
        $query = "DELETE FROM USERS WHERE ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $id);
        if ( $stmt->execute()) {
            return true;
        } else {
            echo "Error:".$query."<br>".mysqli_error($conn);
            return false;
        }
    }

    public function createUser($f, $l, $u, $p)
    {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "INSERT INTO USERS (FIRSTNAME, LASTNAME, USERNAME, PASSWORD) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $f, $l, $u, $p);
        if ( $stmt->execute()) {
            return true;
        } else {
            echo "Error:".$query."<br>".mysqli_error($conn);
            return false;
        }
    }


}