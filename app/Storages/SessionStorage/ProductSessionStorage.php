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

    public function create($id, $title, $price, $discount)
    {

        $_SESSION[$this->productName][$id] = [
            'id' => $id,
            'title' => $title,
            'price' => $price,
            'discount' => $discount,
        ];

        return $this->get($id);

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

    public function getAll(): array
    {
        if (isset($_SESSION[$this->productName]))
            return $_SESSION[$this->productName];
        return [];
    }

}