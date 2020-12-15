<?php


class DiscountBusinessService
{

    public function checkIfDiscountExists($code){
        $db = new Database();
        $conn = $db->getConnection();
        $service = new DiscountDataService($conn);
        return $service->checkIfDiscountExists($code);
    }

    public function getDiscountByCode($code){
        $db = new Database();
        $conn = $db->getConnection();
        $service = new DiscountDataService($conn);
        return $service->getDiscountByCode($code);
    }

}