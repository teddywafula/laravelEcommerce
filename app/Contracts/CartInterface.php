<?php

namespace App\Contracts;

interface CartInterface
{
    public function createCart(int $userId);
    public function addProductToCart(array $data, int $userId);
    public function getCartItems(int $userId);
    public function removeItemFromCart(int $cartItemId, int $userId);
    public function getCart(int $userId);
}
