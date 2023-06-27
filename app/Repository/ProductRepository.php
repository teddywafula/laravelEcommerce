<?php

namespace App\Repository;

use App\Contracts\ProductInterface;
use App\Exceptions\OutOfStockException;
use App\Models\Product;

class ProductRepository implements ProductInterface
{

    public function findAll(): object
    {
        return Product::paginate();
    }

    public function save(array $data ): Product
    {
        $product = new Product();

        return $this->extracted($data, $product);
    }

    public function update(array $data, Product $product): Product
    {
        return $this->extracted($data, $product);
    }

    public function getSingleProduct($productId): ?Product
    {
        return Product::query()->where('id', '=', $productId)->sharedLock()->first();
    }

    public function updateProductQuantity($productId, $quantity): ?Product
    {
        $product = $this->getSingleProduct($productId);

        if (!empty($product)) {

            $qty = $product->quantity;

            $finalQuantity = $qty + $quantity;

            if ($finalQuantity < 0 ) {
                throw new OutOfStockException("The stock cannot be negative");
            }

            $product->quantity = $finalQuantity;

            $product->save();
        }

        return $product;
    }

    /**
     * @param array $data
     * @param Product $product
     * @return Product
     */
    public function extracted(array $data, Product $product): Product
    {
        if (!empty($data['name'])) {
            $product->name = $data['name'];
        }

        if (!empty($data['category_id'])) {
            $product->category_id = $data['category_id'];
        }

        if (!empty($data['vendor_id'])) {
            $product->vendor_id = $data['vendor_id'];
        }

        if (!empty($data['price'])) {
            $product->price = $data['price'];
        }

        if (!empty($data['quantity'])) {
            $product->quantity = $data['quantity'];
        }

        if (!empty($data['description'])) {
            $product->description = $data['description'];
        }

        $product->save();

        return $product;
    }
}
