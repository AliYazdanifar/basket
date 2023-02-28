<?php

use App\Controllers\ProductController;
use App\Models\Product;

include "vendor/autoload.php";

$productController = new ProductController();

$p = new Product(1, ';ll', 'kjkj', 0);

$productController->index($p);


