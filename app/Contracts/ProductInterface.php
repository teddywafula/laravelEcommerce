<?php

namespace App\Contracts;

use App\Models\Product;

interface ProductInterface
{

    public function findAll();
    public function save(array $data): Product;
    public function update(array $data, Product $product);
}
