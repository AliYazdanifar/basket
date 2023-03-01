<?php


namespace App\Storages\Contracts;


use App\Models\Product;

interface BasketStorageContract
{
    public function insert(array $product, int $quantity);

    public function remove(int $id);

    public function getTotalPrice();

    public function getAllItems();
}
