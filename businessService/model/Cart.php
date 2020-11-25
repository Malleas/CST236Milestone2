c<?php


class Cart
{
    private $userID;
    private $items = array();
    private $subtotal = array();
    private $totalPrice;

    /**
     * Cart constructor.
     * @param $userID
     */
    public function __construct($userID)
    {
        $this->userID = $userID;
        $this->items = array();
        $this->subtotal = array();
        $this->totalPrice = 0;
    }


    function addItem($productID)
    {

        if (array_key_exists($productID, $this->items)) {
            $this->items[$productID] += 1;
        } else {
            $this->items = $this->items + array($productID => 1);
        }

    }

    function updateQty($productID, $newQty)
    {

        if (array_key_exists($productID, $this->items)) {
            $this->items[$productID] = $newQty;
        } else {
            $this->items = $this->items + array($productID => $newQty);
        }

        if ($this->items[$productID] == 0) {
            unset($this->items[$productID]);
            unset($this->subtotal[$productID]);
        }
    }

    function calcTotal()
    {
        $subtotalsArray = array();
        $service = new ProductBusinessService();
        $this->totalPrice = 0;
        foreach ($this->items as $item => $qty) {
            $product = $service->findProductByID($item);
            $productSubtotal = $product->getPrice() * $qty;
            $subtotalsArray = $subtotalsArray + array($item => $productSubtotal);
            $this->totalPrice = $this->totalPrice + $productSubtotal;
        }

        $this->subtotal = $subtotalsArray;
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

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * @param array $subtotal
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
    }

    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * @param mixed $totalPrice
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }


}