<?php


namespace App\Storages\Contracts;


use App\Models\Product;

interface ProductStorageContract
{

    public function create($id, $title, $price, $discount);

    public function delete($id);

    public function deleteAll();

    public function get($id);

    public function getAll();

}