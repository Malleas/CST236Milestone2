<?php


class Order
{
    private $id;
    private $date;
    private $addressID;
    private $userID;

    /**
     * Order constructor.
     * @param $id
     * @param $date
     * @param $addressID
     * @param $userID
     */
    public function __construct($id, $date, $addressID, $userID)
    {
        $this->id = $id;
        $this->date = $date;
        $this->addressID = $addressID;
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getAddressID()
    {
        return $this->addressID;
    }

    /**
     * @param mixed $addressID
     */
    public function setAddressID($addressID)
    {
        $this->addressID = $addressID;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }



}