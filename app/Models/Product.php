<?php


namespace App\Models;


use App\Storages\SessionStorage\ProductSessionStorage;

class Product
{
    public $storage;
    private $id;
    private $title;
    private $price;
    private $discount;

    public function __construct($id, $title, $price, $discount)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->discount = $discount;
        $this->storage = new ProductSessionStorage();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    public function create()
    {
        return $this->storage->create($this);
    }

    public function destroy()
    {
        $this->storage->delete($this->id);
    }

    public function get()
    {
        $this->storage->get($this->id);
    }

    public function deleteAll()
    {
        $this->storage->deleteAll();
    }

}