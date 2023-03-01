<?php
session_start();

use App\Controllers\BasketController;
use App\Controllers\ProductController;
use App\Helpers\DisplayHelper;

include "vendor/autoload.php";

$d = new DisplayHelper();
$productController = new ProductController();

$productController->create(1, 'title', 2, 20);

$p = $productController->create(2, 'title', 3, 20);

$p1 = $productController->get(1);
$p2 = $productController->get(2);

//$d->dd($p1);

$sum = [$p1, $p2];

//unset($_SESSION['basket']);
//die();
$basket = new BasketController();
$basket->insert($p1, 5);
$basket->insertGroup($sum, 50);


//$d->dd($basket->insertGroup($sum, 15));
//$basket->remove($p1['id']);
//$basket->removeGroup($sum);
$d->dd($basket->getTotalPrice());


