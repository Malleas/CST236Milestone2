<?php


class ProductBusinessService
{
    public function getAllProducts(){
        $products = Array();
        $service = new ProductDataService();
        $products = $service->getAllProducts();
        return $products;
    }

    public function findProductByID($p){
        $service = new ProductDataService();
        $products = $service->findProductByID($p);
        return $products;
    }

    public function findProductByName($n){
        $products = Array();
        $service = new ProductDataService();
        $products = $service->findProductByName($n);
        return $products;
    }

    public function findProductByDescription($d){
        $products = Array();
        $service = new ProductDataService();
        $products = $service->findProductByDescription($d);
        return $products;
    }

    public function findProductByPrice($p){
        $products = Array();
        $service = new ProductDataService();
        $products = $service->findProductByPrice($p);
        return $products;
    }

    public function updateProduct($id, $n, $d, $p){
        $service = new ProductDataService();
        $service->updateProduct($id, $n, $d, $p);
    }
    public function deleteProduct($id){
        $service = new ProductDataService();
        $service->deleteProduct($id);
    }
    public function createProduct($n, $d, $p){
        $service = new ProductDataService();
        $service->createProduct($n, $d, $p);
    }


}