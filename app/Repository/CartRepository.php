<?php

namespace App\Repository;

use App\Contracts\CartInterface;
use App\Models\Cart;
use App\Models\CartItem;
use ProductFacades;

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

    public function addProductToCart(array $data): CartItem
    {
        $cartItem = new CartItem();

        if (!empty($data['product_id'])) {
            $cartItem->product_id = $data['product_id'];
        }

        if (!empty($data['cart_id'])) {
            $cartItem->cart_id = $data['cart_id'];
        }

        if (!empty($data['quantity'])) {
            $cartItem->quantity = $data['quantity'];
        }

        $checkIfProductInCart = $this->checkIfProductInCart($cartItem->product_id, $cartItem->cart_id);

        if ($checkIfProductInCart->count() > 0) {

            return $this->addQuantityToProductInCart(
                $cartItem->quantity,
                $cartItem->product_id,
                $cartItem->cart_id
            );

        }

        ProductFacades::updateProductQuantity($data['product_id'], -$data['quantity']);

        $cartItem->save();

        return $cartItem;
    }

    public function getCartItems(int $cartId): object
    {
        return CartItem::query()->where('cart_id', '=', $cartId)->paginate();
    }

    public function removeItemFromCart(int $cartItemId): void
    {
        $cartItem = CartItem::query()->find($cartItemId);

        if (!empty($cartItem)) {
            ProductFacades::updateProductQuantity($cartItem->product_id, $cartItem->quantity);
        }

        CartItem::destroy($cartItemId);
    }

    public function getCart(int $userId): Cart
    {
        return Cart::query()->where('user_id', '=', $userId)->first();
    }

    private function checkIfProductInCart($productId, $cartId): \Illuminate\Database\Eloquent\Builder
    {
        return CartItem::query()
            ->where('product_id', '=', $productId)
            ->where('cart_id', '=', $cartId);
    }

    public function addQuantityToProductInCart($quantity, $productId, $cartId): CartItem
    {
        $cartItem = $this->checkIfProductInCart($productId, $cartId)->first();
        if (!empty($cartItem)) {

            if ($quantity >= 0) {

                $qty = $cartItem->quantity;

                $finalQuantity = $quantity + $qty;

                ProductFacades::updateProductQuantity($productId, -$quantity);

                $cartItem->quantity = $finalQuantity;

                $cartItem->save();

            }
        }
        return $cartItem;
    }
}
