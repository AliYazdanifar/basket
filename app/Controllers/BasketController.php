<?php


namespace App\Controllers;


use App\Storages\SessionStorage\BasketSessionStorage;

class BasketController
{

    private $basketStorage;

    public function __construct()
    {
        $this->basketStorage = new BasketSessionStorage();
    }

    public function insert(array $product, $quantity)
    {
        $this->basketStorage->insert($product, $quantity);
    }

    public function insertGroup(array $products, $quantity)
    {
        if ($this->validateQuantity($quantity))
            return $this->basketStorage->insertGroup($products, $quantity);
        return 'Qty is Mines!';
    }

    private function validateQuantity($quantity)
    {
        return ($quantity > 0);
    }

    public function remove(int $id)
    {
        $this->basketStorage->remove($id);
    }

    public function removeGroup(array $sum)
    {
        $this->basketStorage->removeGroup($sum);
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