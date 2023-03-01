<?php


namespace App\Storages\SessionStorage;


use App\Storages\Contracts\BasketStorageContract;

class BasketSessionStorage implements BasketStorageContract
{
    private $basket;

    public function __construct()
    {
        $this->basket = 'basket';
    }

    public function insert(array $product, int $quantity)
    {

        if (isset($_SESSION[$this->basket][$product['id']]))
            $quantity = $_SESSION[$this->basket][$product['id']]['quantity'] += $quantity;

        $_SESSION[$this->basket][$product['id']] = [
            'id' => $product['id'],
            'title' => $product['title'],
            'price' => $product['price'],
            'discount' => $product['discount'],
            'quantity' => $quantity,
        ];

        return $_SESSION[$this->basket][$product['id']];
    }

    public function remove(int $id)
    {

        unset($_SESSION[$this->basket][$id]);
    }

    public function getTotalPrice()
    {

        $products = $this->getAllItems();
        $sum = 0;
        foreach ($products as $product) {
            $sum += $product['price'];
        }

        return $sum;

    }

    public function getAllItems()
    {
        return $_SESSION[$this->basket];
    }

}