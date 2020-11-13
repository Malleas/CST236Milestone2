<?php

class RegistrationBusinessService
{

    public function registerUser($firstName, $lastName, $username, $password){
        $service = new RegistrationDataService();
        return $service->registerUser($firstName, $lastName, $username, $password);
    }

}