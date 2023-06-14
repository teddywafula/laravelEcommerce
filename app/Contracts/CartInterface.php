<?php

namespace App\Contracts;

use App\Models\CartItem;

interface CartInterface
{
    public function createCart(int $userId);
    public function addProductToCart(array $data);
    public function getCartItems(int $userId);
    public function removeItemFromCart(int $cartItemId);
    public function getCart(int $userId);
    public function addQuantityToProductInCart($quantity, $productId, $cartId): CartItem;
}
