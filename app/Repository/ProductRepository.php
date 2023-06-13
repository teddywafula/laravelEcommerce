<?php

namespace App\Repository;

use App\Contracts\ProductInterface;
use App\Models\Product;

class ProductRepository implements ProductInterface
{

    public function findAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Product::all();
    }

    public function save(array $data ): Product
    {
        $product = new Product();
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

    public function update(array $data, Product $product)
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