<?php


class UserBusinessService
{
public function getAllUsers(){
    $users = Array();
    $service = new UserDataService();
    $users = $service->getAllUsers();
    return $users;
}

}