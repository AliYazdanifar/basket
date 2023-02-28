<?php

include "vendor/autoload.php";

$product = new App\Models\Product();

$product->setTitle('title');

echo $product->getTitle();

