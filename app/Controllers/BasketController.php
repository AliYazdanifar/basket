<?php


namespace App\Controllers;


use App\Models\Product;
use App\Storages\SessionStorage\BasketSessionStorage;

class BasketController
{

    private $basketStorage;

    public function __construct()
    {
        $this->basketStorage = new BasketSessionStorage();
    }

    public function insert(array $product,$quantity)
    {
        $this->basketStorage->insert($product,$quantity);
    }

    public function remove(int $id)
    {
        $this->basketStorage->remove($id);
    }

    public function getTotalPrice()
    {
        return $this->basketStorage->getTotalPrice();
    }

    public function getAllItems()
    {
        return $this->basketStorage->getAllItems();
    }


}