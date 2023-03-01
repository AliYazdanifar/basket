<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController
{

    public $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {

        return $this->product->getAll();
    }

    public function create($id, $title, $price, $discount)
    {
        $validator = $this->product->validate($title, $price, $discount);
        if (!$validator['status'])
            return $validator['msg'];

        return $this->product->create($id, $title, $price, $discount);

    }

    public function destroy($id)
    {
        $this->product->destroy($id);
    }

    public function get($id)
    {
        return $this->product->get($id);
    }

    public function destroyAll()
    {
        $this->product->destroyAll();

    }
}