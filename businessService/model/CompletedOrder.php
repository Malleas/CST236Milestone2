<?php


class CompletedOrder implements JsonSerializable
{
    private $id;
    private $date;
    private $addressID;
    private $addressUserID;
    private $orderDetailsID;
    private $qty;
    private $currentPrice;
    private $description;
    private $productID;
    private $productName;

    /**
     * CompletedOrder constructor.
     * @param $id
     * @param $date
     * @param $addressID
     * @param $addressUserID
     * @param $orderDetailsID
     * @param $qty
     * @param $currentPrice
     * @param $description
     * @param $productID
     * @param $productName
     */
    public function __construct($id, $date, $addressID, $addressUserID, $orderDetailsID, $qty, $currentPrice, $description, $productID, $productName)
    {
        $this->id = $id;
        $this->date = $date;
        $this->addressID = $addressID;
        $this->addressUserID = $addressUserID;
        $this->orderDetailsID = $orderDetailsID;
        $this->qty = $qty;
        $this->currentPrice = $currentPrice;
        $this->description = $description;
        $this->productID = $productID;
        $this->productName = $productName;
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
    public function getAddressUserID()
    {
        return $this->addressUserID;
    }

    /**
     * @param mixed $addressUserID
     */
    public function setAddressUserID($addressUserID)
    {
        $this->addressUserID = $addressUserID;
    }

    /**
     * @return mixed
     */
    public function getOrderDetailsID()
    {
        return $this->orderDetailsID;
    }

    /**
     * @param mixed $orderDetailsID
     */
    public function setOrderDetailsID($orderDetailsID)
    {
        $this->orderDetailsID = $orderDetailsID;
    }

    /**
     * @return mixed
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * @param mixed $qty
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
    }

    /**
     * @return mixed
     */
    public function getCurrentPrice()
    {
        return $this->currentPrice;
    }

    /**
     * @param mixed $currentPrice
     */
    public function setCurrentPrice($currentPrice)
    {
        $this->currentPrice = $currentPrice;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * @param mixed $productID
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param mixed $productName
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }




    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}