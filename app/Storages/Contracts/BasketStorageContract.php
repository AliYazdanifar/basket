<?php


namespace App\Storages\Contracts;


interface BasketStorageContract
{
    public function insert($product, int $quantity);

    public function insertGroup(array $products, int $quantity, int $discount = 0);

    public function remove(int $id);

    public function getTotalPrice();

    public function getAllItems();
}
