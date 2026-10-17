<?php

namespace App\Services;

use App\Models\Product; 

class ProductService
{
    public function getProducts()
    {
        return Product::all();
    }
}