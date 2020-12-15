<?php


class Order
{
    private $id;
    private $date;
    private $addressID;
    private $userID;
    private $discountID;

    /**
     * Order constructor.
     * @param $id
     * @param $date
     * @param $addressID
     * @param $userID
     * @param $discountID
     */
    public function __construct($id, $date, $addressID, $userID, $discountID)
    {
        $this->id = $id;
        $this->date = $date;
        $this->addressID = $addressID;
        $this->userID = $userID;
        $this->discountID = $discountID;
    }

    /**
     * @return mixed
     */
    public function getDiscountID()
    {
        return $this->discountID;
    }

    /**
     * @param mixed $discountID
     */
    public function setDiscountID($discountID)
    {
        $this->discountID = $discountID;
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