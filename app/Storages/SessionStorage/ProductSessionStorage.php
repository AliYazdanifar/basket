<?php


namespace App\Storages\SessionStorage;


use App\Models\Product;
use App\Storages\Contracts\ProductStorageContract;

class ProductSessionStorage implements ProductStorageContract
{
    private $productName;

    public function __construct()
    {
        $this->productName = 'product';
    }

    public function create(Product $product)
    {
        $_SESSION[$this->productName][$product->getId()] = [
            'title' => $product->getTitle(),
            'price' => $product->getPrice(),
            'discount' => $product->getDiscount(),
        ];

        return true;

    }

    public function delete($id)
    {
        unset($_SESSION[$this->productName][$id]);
    }

    public function deleteAll()
    {
        unset($_SESSION[$this->productName]);
    }

    public function get($id)
    {
        if (isset($_SESSION[$this->productName][$id]))
            return $_SESSION[$this->productName][$id];
        return [];
    }

    public function getAll()
    {
        if (isset($_SESSION[$this->productName]))
            return $_SESSION[$this->productName];
        return [];
    }

}