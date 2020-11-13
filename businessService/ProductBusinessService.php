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
        $products = Array();
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

}