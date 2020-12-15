<?php


class Discount
{
    private $id;
    private $discountCode;
    private $discountDollar;
    private $discountPercentage;

    /**
     * Discount constructor.
     * @param $id
     * @param $discountCode
     * @param $discountDollar
     * @param $discountPercentage
     */
    public function __construct($id, $discountCode, $discountDollar, $discountPercentage)
    {
        $this->id = $id;
        $this->discountCode = $discountCode;
        $this->discountDollar = $discountDollar;
        $this->discountPercentage = $discountPercentage;
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
    public function getDiscountCode()
    {
        return $this->discountCode;
    }

    /**
     * @param mixed $discountCode
     */
    public function setDiscountCode($discountCode)
    {
        $this->discountCode = $discountCode;
    }

    /**
     * @return mixed
     */
    public function getDiscountDollar()
    {
        return $this->discountDollar;
    }

    /**
     * @param mixed $discountDollar
     */
    public function setDiscountDollar($discountDollar)
    {
        $this->discountDollar = $discountDollar;
    }

    /**
     * @return mixed
     */
    public function getDiscountPercentage()
    {
        return $this->discountPercentage;
    }

    /**
     * @param mixed $discountPercentage
     */
    public function setDiscountPercentage($discountPercentage)
    {
        $this->discountPercentage = $discountPercentage;
    }


}