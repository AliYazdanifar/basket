<?php

namespace App\Controllers;

use App\Helpers\DisplayHelper;
use App\Models\Product;
use App\Storages\SessionStorage\ProductSessionStorage;

class ProductController
{
    use DisplayHelper;

    public $storage;

    public function __construct()
    {
        $this->storage = new ProductSessionStorage();
    }

    public function index()
    {

        $products = $this->storage->getAll();

        $this->dd($products);
    }

    public function createProduct(Product $product)
    {
        $validator = $this->validate($product);
        if (!$validator['status'])
            echo $validator['msg'];


    }


    public function validate(Product $product)
    {

        if (empty($product->getTitle()) || $product->getTitle() == '' || $product->getTitle() == null)
            return [
                'status' => false,
                'msg' => 'Title cannot be empty.'
            ];

        if ($product->getPrice() < 0)
            return [
                'status' => false,
                'msg' => 'Negative value is not allowed for price.'
            ];

        if ($product->getDiscount() < 0)
            return [
                'status' => false,
                'msg' => 'Negative value is not allowed for discount.'
            ];

        if ($product->getDiscount() > 100)
            return [
                'status' => false,
                'msg' => 'Negative value is not allowed for discount.'
            ];

        return [
            'status' => true,
            'msg' => 'OK'
        ];

    }
}