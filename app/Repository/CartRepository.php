<?php

namespace App\Repository;

use App\Contracts\CartInterface;
use App\Models\Cart;

class CartRepository implements CartInterface
{

    public function createCart(int $userId): Cart
    {
        $cart = new Cart();
        if (!empty($userId)) {
            $cart->user_id = $userId;
        }
        $cart->save();
        return $cart;
    }

    public function addProductToCart(array $data, int $userId)
    {

    }

    public function getCartItems(int $userId)
    {
        // TODO: Implement getCartItems() method.
    }

    public function removeItemFromCart(int $cartItemId, int $userId)
    {
        // TODO: Implement removeItemFromCart() method.
    }

    public function getCart(int $userId)
    {
        // TODO: Implement getCart() method.
    }
}
