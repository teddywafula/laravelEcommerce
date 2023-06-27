<?php

namespace App\Contracts;

use App\Models\Cart;
use App\Models\CartItem;

interface CartInterface
{
    public function createCart(int $userId): Cart;
    public function addProductToCart(array $data): CartItem;
    public function getCartItems(int $userId): \Illuminate\Database\Eloquent\Collection | array;
    public function removeItemFromCart(int $cartItemId);
    public function getCart(int $userId): Cart;
    public function addQuantityToProductInCart($quantity, $productId, $cartId): CartItem;
}
