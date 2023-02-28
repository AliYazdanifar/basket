<?php


namespace App\Models;


class Product
{
    private $id;
    private $title;
    private $price;
    private $discount;


    public function __construct($id, $title, $price, $discount)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->discount = $discount;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }


}