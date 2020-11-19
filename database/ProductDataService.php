<?php


class ProductDataService
{
    public function getAllProducts(){
        $db = new Database();
        $conn = $db->getConnection();
        $query = "Select * from PRODUCTS";
        $results = $conn->query($query);

        if($results->num_rows == 0){
            return null;
        }else{
            $productArray = Array();
            while ($product = $results->fetch_assoc()){
                array_push($productArray, $product);
            }
            return $productArray;
        }
    }

    public function findProductByID($id){
        $db = new Database();
        $conn = $db->getConnection();
        $query = "Select * from PRODUCTS where ID = ? ";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $results = $stmt->get_result();

        if($results->num_rows == 0){
            return null;
        }else{
            $productArray = Array();
            while ($product = $results->fetch_assoc()){
                array_push($productArray, $product);
            }
            $p = new Product($productArray[0]['ID'], $productArray[0]['PRODUCTNAME'], $productArray[0]['DESCRIPTION'], $productArray[0]['PRICE']);
            return $p;
        }
    }

    public function findProductByName($n){
        $db = new Database();
        $conn = $db->getConnection();
        $query = "Select * from PRODUCTS where PRODUCTNAME like ?";
        $stmt = $conn->prepare($query);
        $like_n = "%".$n."%";
        $stmt->bind_param("s", $like_n);
        $stmt->execute();
        $results = $stmt->get_result();

        if($results->num_rows == 0){
            return null;
        }else{
            $productArray = Array();
            while ($product = $results->fetch_assoc()){
                array_push($productArray, $product);
            }
            return $productArray;
        }
    }

    public function findProductByPrice($p){
        $db = new Database();
        $conn = $db->getConnection();
        $query = "Select * from PRODUCTS where PRICE like ?";
        $stmt = $conn->prepare($query);
        $like_p = "%".$p."%";
        $stmt->bind_param("s", $like_p);
        $stmt->execute();
        $results = $stmt->get_result();

        if($results->num_rows == 0){
            return null;
        }else{
            $productArray = Array();
            while ($product = $results->fetch_assoc()){
                array_push($productArray, $product);
            }
            return $productArray;
        }
    }

    public function findProductByDescription($d){
        $db = new Database();
        $conn = $db->getConnection();
        $query = "Select * from PRODUCTS where DESCRIPTION like ?";
        $stmt = $conn->prepare($query);
        $like_d = "%".$d."%";
        $stmt->bind_param("s", $like_d);
        $stmt->execute();
        $results = $stmt->get_result();

        if($results->num_rows == 0){
            return null;
        }else{
            $productArray = Array();
            while ($product = $results->fetch_assoc()){
                array_push($productArray, $product);
            }
            return $productArray;
        }
    }

    public function updateProduct($id, $n, $d, $p){
        $db = new Database();
        $conn = $db->getConnection();
        $query = "UPDATE PRODUCTS SET PRODUCTNAME = ?, DESCRIPTION = ?, PRICE = ? WHERE ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $n, $d, $p, $id);

        if ( $stmt->execute()) {
            return true;
        } else {
            echo "Error:".$query."<br>".mysqli_error($conn);
            return false;
        }

    }

    public function deleteProduct($id){
        $db = new Database();
        $conn = $db->getConnection();
        $query = "DELETE FROM PRODUCTS WHERE ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s",  $id);

        if ( $stmt->execute()) {
            return true;
        } else {
            echo "Error:".$query."<br>".mysqli_error($conn);
            return false;
        }

    }

    public function createProduct($n, $d, $p){
        $db = new Database();
        $conn = $db->getConnection();
        $query = "INSERT INTO PRODUCTS (PRODUCTNAME, DESCRIPTION, PRICE) VALUE (?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssd",  $n, $d, $p);

        if ( $stmt->execute()) {
            return true;
        } else {
            echo "Error:".$query."<br>".mysqli_error($conn);
            return false;
        }

    }

}