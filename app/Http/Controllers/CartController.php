<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use CartFacades;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    /**
     * Add items to cart.
     */
    public function addToCart(CartRequest $request)
    {
        return response()->json(CartFacades::addProductToCart($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createCart(CartRequest $request): JsonResponse
    {
        return response()->json(CartFacades::createCart($request->input('user_id'), Response::HTTP_CREATED));
    }

    /**
     * Display the specified resource.
     */
    public function getCart(Request $request)
    {
        return response()->json(CartFacades::getCart($request->query('user_id'), Response::HTTP_OK));
    }


    /**
     * Display the specified resource.
     */
    public function getCartItems(Request $request, $id)
    {
        return response()->json(CartFacades::getCartItems($id, Response::HTTP_OK));
    }

    /**
     * Remove cart item.
     */
    public function removeCartItem(Request $request, $id)
    {
        return response()->json(CartFacades::removeItemFromCart($id), Response::HTTP_NO_CONTENT);
    }
}
