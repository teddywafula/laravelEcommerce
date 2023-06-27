<?php

namespace App\Contracts;

use App\Models\Product;

interface ProductInterface
{

    public function findAll(): object;
    public function save(array $data): Product;
    public function update(array $data, Product $product): Product;
    public function updateProductQuantity($productId, $quantity): ?Product;
    public function getSingleProduct($productId): ?Product;
}
