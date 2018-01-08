<?php

namespace App\Repositories;

use App\Product;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $product)
    {
        $this->entity = $product;
    }
}