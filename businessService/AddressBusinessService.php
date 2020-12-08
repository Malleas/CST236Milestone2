<?php


class AddressBusinessService
{
    public function getAddress($userID){
        $db = new Database();
        $conn = $db->getConnection();
        $addressService = new AddressDataService($conn);
        return $addressService->getAddress($userID);
    }

}