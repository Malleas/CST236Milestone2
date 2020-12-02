<?php


class Address
{
    private $id;
    private $addressType;
    private $isPrimary;
    private $street;
    private $city;
    private $state;
    private $zipcode;
    private $usersID;

    /**
     * Address constructor.
     * @param $id
     * @param $addressType
     * @param $isPrimary
     * @param $street
     * @param $city
     * @param $state
     * @param $zipcode
     * @param $usersID
     */
    public function __construct($id, $addressType, $isPrimary, $street, $city, $state, $zipcode, $usersID)
    {
        $this->id = $id;
        $this->addressType = $addressType;
        $this->isPrimary = $isPrimary;
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
        $this->zipcode = $zipcode;
        $this->usersID = $usersID;
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
    public function getAddressType()
    {
        return $this->addressType;
    }

    /**
     * @param mixed $addressType
     */
    public function setAddressType($addressType)
    {
        $this->addressType = $addressType;
    }

    /**
     * @return mixed
     */
    public function getIsPrimary()
    {
        return $this->isPrimary;
    }

    /**
     * @param mixed $isPrimary
     */
    public function setIsPrimary($isPrimary)
    {
        $this->isPrimary = $isPrimary;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param mixed $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return mixed
     */
    public function getUsersID()
    {
        return $this->usersID;
    }

    /**
     * @param mixed $usersID
     */
    public function setUsersID($usersID)
    {
        $this->usersID = $usersID;
    }


}