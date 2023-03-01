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

    public function insert($product, int $quantity)
    {

        if (!$this->handleIfExist($product)) {
            return $_SESSION[$this->basket][$product['id']];
        }

        $quantity = $this->handleQuantity($product, $quantity);

//        echo $quantity;
//        die();
        $_SESSION[$this->basket][$product['id']] = [
            'id' => $product['id'],
            'title' => $product['title'],
            'price' => $product['price'],
            'discount' => $product['discount'],
            'quantity' => $quantity,
        ];

        return $_SESSION[$this->basket][$product['id']];
    }

    private function handleIfExist($product)
    {
        $products = $this->getAllItems();

        foreach ($products as $key => $prd) {
            if (substr($key, 0, 3) == 'sum') {
                foreach ($prd as $k => $item) {
                    if ($k == 'id' && $item == $product['id'])
                        return false;
                }
            }

        }
        return true;
    }

    public function getAllItems()
    {
        if (isset($_SESSION[$this->basket]))
            return $_SESSION[$this->basket];
        return [];
    }

    private function handleQuantity(array $product, $quantity)
    {

        if (isset($_SESSION[$this->basket][$product['id']]['quantity']))
            $quantity += $_SESSION[$this->basket][$product['id']]['quantity'];

        return $quantity;
    }

    public function insertGroup(array $products, int $quantity, int $discount = 0)
    {


        $id = $this->handleId($products);

        $this->handleGroupQuantity($id, $quantity);

        $_SESSION[$this->basket][$id]['groupDiscount'] = $discount;


        foreach ($products as $key => $product) {

            if (!isset($_SESSION[$this->basket][$product['id']]))
                $_SESSION[$this->basket][$id][$product['id']] = [
                    'id' => $product['id'],
                    'title' => $product['title'],
                    'price' => $product['price'],
                    'discount' => $product['discount'],
                    'quantity' => 1,
                ];
        }

        return $_SESSION[$this->basket][$id];
    }

    private function handleId($products)
    {
        $id = 'sum-';
        foreach ($products as $key => $product) {
            $id .= $product['id'];
        }

        return $id;
    }

    private function handleGroupQuantity($groupId, $quantity)
    {

        if (isset($_SESSION[$this->basket][$groupId]['quantity']))
            $_SESSION[$this->basket][$groupId]['quantity'] += $quantity;
        else
            $_SESSION[$this->basket][$groupId]['quantity'] = $quantity;

    }

    public function remove(int $id)
    {
        if (isset($_SESSION[$this->basket][$id]))
            unset($_SESSION[$this->basket][$id]);
    }

    public function removeGroup(array $sum)
    {
        $id = $this->handleId($sum);
        if (isset($_SESSION[$this->basket][$id]))
            unset($_SESSION[$this->basket][$id]);
    }

    public function getTotalPrice()
    {
        $sum = $this->getSum();

        return $sum;

    }

    private function getSum()
    {
        $products = $this->getAllItems();
        $sum = 0;
        foreach ($products as $key => $product) {
            if (substr($key, 0, 3) == 'sum') {
                foreach ($product as $v) {
                    if (is_array($v)) {
                        foreach ($v as $kk => $vv) {
                            if ($kk == 'price')
                                $sum += $vv;
                        }
                    }
                }
            } else {
                $sum += $product['price'];
            }
        }
        return $sum;
    }
}