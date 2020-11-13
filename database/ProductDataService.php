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
        $query = "Select * from PRODUCTS where ID = '$id' ";
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

    public function findProductByName($n){
        $db = new Database();
        $conn = $db->getConnection();
        $query = "Select * from PRODUCTS where PRODUCTNAME like '%$n%'";
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

    public function findProductByPrice($p){
        $db = new Database();
        $conn = $db->getConnection();
        $query = "Select * from PRODUCTS where PRICE like '%$p%'";
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

    public function findProductByDescription($d){
        $db = new Database();
        $conn = $db->getConnection();
        $query = "Select * from PRODUCTS where DESCRIPTION like '%$d%'";
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

}