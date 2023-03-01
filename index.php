<?php
session_start();

use App\Controllers\BasketController;
use App\Controllers\ProductController;
use App\Helpers\DisplayHelper;

include "vendor/autoload.php";

$d = new DisplayHelper();
$productController = new ProductController();

$productController->create(1, 'title', 12, 20);

$p = $productController->create(2, 'title', 12, 20);

$p1 = $productController->get(1);
$p2 = $productController->get(2);

//$d->dd($p1);


//unset($_SESSION['basket']);

$basket = new BasketController();
$basket->insert($p1, 1);
$basket->insert($p2, 2);

//$basket->remove($p1['id']);
//$basket->remove($p2['id']);
$d->dd($basket->getAllItems());


