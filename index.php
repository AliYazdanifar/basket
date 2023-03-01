<?php
session_start();

use App\Controllers\ProductController;
use App\Models\Product;

include "vendor/autoload.php";

$productController = new ProductController();

$p = new Product(1, ';ll', 'kjkj', 0);
$productController->create($p);
$p2 = new Product(2, ';ll', 'kjkj', 0);
$productController->create($p2);

$productController->destroy($p);

$productController->index();


