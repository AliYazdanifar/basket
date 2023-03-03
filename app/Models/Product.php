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

    public function __construct()
    {
        $this->storage = new ProductSessionStorage();
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param mixed $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
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

    public function create($id, $title, $price, $discount)
    {
        return $this->storage->create($id, $title, $price, $discount);
    }

    public function destroy($id)
    {
        $this->storage->delete($id);
    }

    public function get($id)
    {
        return $this->storage->get($id);
    }

    public function getAll()
    {
        return $this->storage->getAll();
    }


    public function destroyAll()
    {
        $this->storage->deleteAll();
    }

    public function validate($title, $price, $discount)
    {

        if (empty($title) || $title == '' || $title == null)
            return [
                'status' => false,
                'msg' => 'Title cannot be empty.'
            ];

        if ($price < 0)
            return [
                'status' => false,
                'msg' => 'Negative value is not allowed for price.'
            ];

        if ($discount < 0)
            return [
                'status' => false,
                'msg' => 'Negative value is not allowed for discount.'
            ];

        if ($discount > 100)
            return [
                'status' => false,
                'msg' => 'Quantity more than 100 is not allowed for discount.'
            ];

        return [
            'status' => true,
            'msg' => 'OK'
        ];

    }


}
