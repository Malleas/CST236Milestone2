<?php


class UserBusinessService
{
    public function getAllUsers()
    {
        $users = array();
        $service = new UserDataService();
        $users = $service->getAllUsers();
        return $users;
    }

    public function findUserByID($id)
    {
        $user = array();
        $service = new UserDataService();
        $user = $service->findUserByID($id);
        return $user;
    }

    public function updateUser($id, $f, $l, $r, $u, $p)
    {
        $service = new UserDataService();
        $service->updateUser($id, $f, $l, $r, $u, $p);
    }

    public function deleteUser($id)
    {
        $service = new UserDataService();
        $service->deleteUser($id);
    }

    public function createUser($f, $l, $u, $p)
    {
        $service = new UserDataService();
        return $service->createUser($f, $l, $u, $p);
    }

}